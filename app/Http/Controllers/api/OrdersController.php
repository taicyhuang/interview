<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Products;
use App\Models\Plantings;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Orders::all();

        return Response([
            'status' => true,
            'data'   => $data,
        ],200);
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
        $number     = $request->input('number');
        $name       = $request->input('name');
        $pn         = $request->input('pn');
        $productId = $request->input('product_id');

        $productPn = Products::where('pn', '=', $pn);
        if(is_null($productPn)){
            return Response([
                'status' => true,
                'message'=> '查無此產品代號',
            ],404);
        }

        $product = Products::find($productId);
        if(is_null($product)){
            return Response([
                'status' => false,
                'message'=> '找不到此產品'
            ],404);
        }

        $spec       = $request->input('spec');
        $amount     = $request->input('amount');

        $customerId = $request->input('customer_id');
        $customer   = Customers::find($customerId);

        if(is_null($customer)){
            return Response([
                'status'=> true,
                'message'=> '找不到此客戶',
            ],404);
        }
        $stauts = $request->input('status');

        $factory    = $request->input('factory');
        $quantity   = $request->input('quantity');
        $unit       = $request->input('unit');
        $plantingId = $request->input('planting');
        $planting   = Plantings::find($plantingId);
        if(is_null($planting)){
            return Response([
                'status' => true,
                'message'=> '電鍍等級錯誤',
            ],404);
        }

        $dueDate    = Carbon::parse($request->input('dueDate'));
        $warehouse  = $request->input('warehouse');
        $note       = $request->input('note');

        $saveData = [
            'number'       => $number,
            'name'         => $name,
            'pn'           => $pn,
            'spec'         => $spec,
            'amount'       => $amount,
            'customer_id'  => $customerId,
            'planting_id'  => $plantingId,
            'product_id'   => $productId,
            'duedate'      => $dueDate,
            'note'         => $note,
            'status'       => $stauts,
            'warehouse'    => $warehouse,
            'note'         => $note,
            'quantity'     => $quantity,
            'unit'         => $unit,
        ];

        try{
            DB::beginTransaction();
            Orders::create($saveData);
            DB::commit();
            return Response([
                'status' =>true,
                'message'=>'新增成功'
            ],200);
        }catch(Exception $e){
            DB::rollBack();
            return Response([
                'status' => false,
                'message' => '新增失敗',
            ],404);
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
}
