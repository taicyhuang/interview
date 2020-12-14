<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Hangers;
use App\Models\Plantings;
use App\Models\ProductHangerPlanting as HangerPlanting;
use App\Models\Products;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = DB::table('products')->get();

        return Response([
            'status' => true,
            'data' => $data,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // TODO:: 驗證
        // name pn amount pic hanger_id plating_id volat description tonema factory status
        // 前端必須要帶customer_code 給pn

        $code = $request->input('code'); // 客戶代碼
        $pn = $request->input('pn'); // 產品編號
        $name = $request->input('name'); // 品名
        $spec = $request->input('spec'); // 規格

        $planting_id = $request->input('planting_id'); // 電鍍等級id
        $hanger_id = $request->input('hanger_id'); // 掛具 id
        $product_id = $request->input('product_id'); // 產品id

        $amount = $request->input('amount'); // 電鍍金額
        // $volat        = $request->input('volat'); 由app端帶回
        $cu = $request->input('cu'); // 鈷
        $h_ni = $request->input('h_ni'); // 半光涅
        $full_ni = $request->input('full_ni'); // 全光孽
        $m_ni = $request->input('m_ni'); // 唯恐孽
        $cr = $request->input('cr'); // 珞

        $description = $request->input('description'); // 注意事項
        $tonema = $request->input('tonema'); // 同馬術
        $factory = $request->input('factory'); // 射出場
        $status = 1;

        if (is_null($code)) {
            return Response([
                'status' => false,
                'message' => '客戶代碼不能為空',
            ], 404);
        }

        $customer = Customers::find('code', '=', $code)
            ->selectRaw('id')
            ->get()->first();

        if (is_null($customer)) {
            return Response([
                'status' => false,
                'message' => '客戶代碼錯誤',
            ], 404);
        }
        $customerId = $customer->id;

        if (is_null($pn)) {
            return Response([
                'status' => false,
                'message' => '產品編號不能為空',
            ], 404);
        }
        if (is_null($planting_id)) {
            return Response([
                'status' => false,
                'message' => '電鍍等級不能為空',
            ], 404);
        }
        $planting = Plantings::find($planting_id);
        if (is_null($planting)) {
            return Response([
                'status' => false,
                'message' => '找不到此電鍍等級',
            ]);
        }

        if (is_null($hanger_id)) {
            return Response([
                'status' => false,
                'message' => '掛具不能為空',
            ], 404);
        }
        $hanger = Hangers::find($hanger_id);
        if (is_null($hanger)) {
            return Response([
                'status' => false,
                'message' => '找不到此掛具',
            ]);
        }

        // 圖片路徑
        $path = env('APP_STORAGE');
        $pathFloder = $path . '/' . env('APP_NAME');

        $saveData = [
            'pn' => $pn,
            'name' => $name,
            'spec' => $spec,
            'description' => $description,
            'amiunt' => $amount,
            'tonema' => $tonema,
            'factory' => $factory,
            'status' => $status,
            'customer_id' => $customerId,
        ];

        // 前端回傳json
        // 轉 array for 迴圈去做 create

        $hanger_id = 1;

        $lastProduct = DB::table('products')
            ->orderby('id', 'DESC')
            ->limit(1)
            ->get()->first();
        $productId = $lastProduct->id;
        if (is_null($product_id)) {
            $product_id = 0;
        }
        $newProductId = $productId + 1;

        $palntingHanger = [
            'hanger_id' => $hanger_id,
            'plating_id' => $planting_id,
            'product_id' => $newProductId,
        ];

        try {
            DB::beginTransaction();
            Products::create($saveData);
            HangerPlanting::create($palntingHanger);
            DB::commit();
            return Response([
                'status' => true,
                'message' => 'success',
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            return Response([
                'status' => false,
                'message' => '新增失敗',
            ], 404);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    function list($id) {
        // 帶入客戶id
        $customer = Customers::find($id)
            ->select('code', 'name')->get()->first();

        $plantings = Plantings::all();
        $hangers = Hangers::all();

        if (is_null($customer)) {
            return Response([
                'status' => false,
                'message' => '找不到此客戶',
            ], 404);
        }

        if (strpos(env('APP_NAME'), 'dev') > 0) {
            // 本地端
            $path = dirname($_SERVER['DOCUMENT_ROOT']);
            $pathFloder = $path . '/' . env('APP_NAME') . '/' . $code;
        } else {
            $path = env('APP_STORAGE');
            $pathFloder = '/mnt/mkhPic/mkh-online/' . $code;
        }

        // show 出客戶資料
        return Response([
            'status' => true,
            'data' => $customer,
            'plantings' => $plantings,
            'hangers' => $hangers,
            'picUrl' => $pathFloder,
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
