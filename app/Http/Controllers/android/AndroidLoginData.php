<?php

namespace App\Http\Controllers\android;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AndroidLoginData extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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

    public function loginData(Request $request)
    {
        $account = $request->input('account');
        $pwd = $request->input('password');

        $user = Users::where('account', '=', $account)->get()->first();

        if (is_null($user)) {
            return Response([
                'status' => true,
                'message' => '沒有這個人',
            ], 404);
        }

        if (Hash::check($pwd, $user->password)) {
            // return \response($user, Response::HTTP_CREATED);
            // 也可以自行設定 HTTP code
            // 登入的時候順便更新api_token

            $date = Carbon::parse($user->created_at);

            // $api_token = rand(0,9999999);
            // $user->api_token = $api_token;
            // $user->save();

            $data = [];
            $data['account'] = $user->account;
            $data['api_token'] = $user->api_token;
            $data['model'] = $user->model;
            $data['status'] = $user->status;
            $data['create_at'] = $date->format('Y-m-d');
            $plantingList = DB::table('platings')
                ->select('id', 'name')->get();

            $orders = DB::table('orders')

            // "id": 2,
            // "number": "ABC-1234",
            // "customer_id": 1,
            // "duedate": "2020-11-22 18:31:27",
            // "note": "注意事項",
            // "status": "2",
            // "warehouse": "進到哪個倉庫",
            // "created_at": "2020-11-22 18:31:27",
            // "updated_at": "2020-11-22 18:31:27",
            // "planting_id": 100,
            // "quantity": "1",
            // "unit": "1",
            // "product_id": 1,
            // "remake": 0
            // ->join('products', 'products.id', '=', 'orders.product_id')
            // ->join('customers', 'customers.id', '=', 'products.customer_id')
            // ->join('products_platings_hangers', 'products_platings_hangers.product_id', '=', 'products.id')
                ->where(function ($query) {
                    $query->where('orders.status', '=', '4');
                    // ->orWhere('orders.status', '=', '2');
                })->get()->toArray();

            if (is_null($orders)) {
                return Response([
                    'status' => false,
                    'message' => '請洽詢工程師,詢問資料庫內訂單編號是否存在',
                ], 404);
            }

            // $order = array();
            // $order['CustomerNumber'] = $orders->customer_id;
            // $order['StorageNumber'] = $orders->warehouse;
            // $order['ProductNumber'] = '';
            // $order['ProductName'] = '';
            // $order['Spec'] = '';
            // $order['EPlatingLevel'] = $orders->planting_id;
            // $order['EPlatingPrice'] = '';
            // $order['Voltage'] = '';
            // $order['StoragePlace'] = '';
            // $order['EPlatingCount'] = '';
            // $order['DeliveryTime'] = $orders->duedate;
            // $order['MoldingFactory'] = '';
            // $order['PlatingRacks'] = '';
            // $order['Notice'] = '';
            // $order['note'] = $orders->note;

            // $orderArray = array();
            // dd($orders);
            // foreach ($orders as $key => $order) {
            //     echo $order . "\n";
            // }
            // exit;

            // $order = array(
            //     [
            //         "CustomerNumber" => $orders->customer_id,
            //         'StorageNumber' => $orders->warehouse,
            //         'ProductNumber' => 'ProductNumberFake',
            //         'ProductName' => 'ProductNameFake',
            //         'Spec' => 'SpecFake',
            //         'EPlatingLevel' => $orders->planting_id,
            //         'EPlatingPrice' => '666Fake',
            //         'Voltage' => '',
            //         'StoragePlace' => 'StoragePlaceFake',
            //         'EPlatingCount' => 'EPlatingCountFake',
            //         'DeliveryTime' => $orders->duedate,
            //         'MoldingFactory' => '射出廠資料',
            //         'PlatingRacks' => '',
            //         'status' => $orders->status,
            //         'Notice' => '注意事項',
            //         'note' => '說明',
            //     ],
            // );

            return Response([
                'status' => true,
                'data' => $data,
                'orders' => $orders,
                'plantingList' => $plantingList,
            ], 200);

        } else {
            return Response([
                'status' => false,
                'message' => '沒權限登入',
            ], 404);
        }
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

    public function shunlau(Request $request)
    {
        // 上料

        $ProductNumber = $request->input('ProductNumber');
        if (is_null($ProductNumber)) {
            return Response([
                'status' => false,
                'message' => '產品編號不得為空值',
            ], 404);
        };

        $product = Products::where('name', '=', $ProductNumber);
        if (is_null($product)) {
            return Response([
                'status' => false,
                'message' => '產品編號錯誤,找不到此產品',
            ], 404);
        }

        $order = Orders::where('name', '=', $ProductNumber)->get();

        if (is_null($order)) {
            return Response([
                'status' => false,
                'message' => '請確認是否有此筆訂單',
            ], 404);
        }
        $order->status = '4';
        $order->save();

    }
    public function shalau(Request $request)
    {
        // 下料
    }

    public function online(Request $request)
    {
        // 上線
    }

}
