<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO::驗證

        $data = Customers::all();
        if (is_null($data)) {
            return Response([
                'status' => false,
                'message' => '找不到資料',
            ], 404);
        }
        return Response([
            'status' => true,
            'data' => $data,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $code = $request->input('code');

        if (is_null($code) || empty($code)) {
            return Response([
                'status' => false,
                'message' => '客戶代碼不能是空值',
            ], 404);
        }

        // 判斷輸入進來的code 是否重複
        $customer = Customers::where('code', '=', $code);
        if (is_null($customer)) {
            return Response([
                'status' => true,
                'message' => '此代碼已用過',
            ], 404);
        }

        if (strpos(env('APP_NAME'), 'dev') > 0) {
            // 本地端

            $path = dirname($_SERVER['DOCUMENT_ROOT']);
            $pathFloder = $path . '/' . env('APP_NAME') . '/' . $code;

            try {
                DB::beginTransaction();
                Customers::create($input);
                DB::commit();
                File::makeDirectory($pathFloder, 0777, true);
                return Response([
                    'status' => true,
                    'message' => 'success',
                ], 200);

            } catch (Exception $e) {
                DB::rollBack();
                File::deleteDirectory($pathFloder);
                $folders = \scandir($path . '/' . env('APP_NAME'));
                foreach ($folders as $key => $folder) {
                    if ($folder != '.' && $folder != '..') {
                        if ($code === $folder) {
                            rmdir($pathFloder);
                        }
                    }
                }
                return Response([
                    'status' => true,
                    'message' => '新增失敗',
                ], 404);

            }
        } else {
            $path = env('APP_STORAGE');
            $pathFloder = '/mnt/mkhPic/mkh-online/' . $code;

            try {
                DB::beginTransaction();
                Customers::create($input);
                DB::commit();
                File::makeDirectory($pathFloder, 0777, true, true);

                return Response([
                    'status' => true,
                    'message' => 'success',
                ], 200);
            } catch (Exception $e) {

                // $folders = \scandir($path . '/' . env('APP_NAME'));
                // foreach ($folders as $key => $folder) {
                //     if ($folder != '.' && $folder != '..') {
                //         if ($code === $folder) {
                //             rmdir($pathFloder);
                //         }
                //     }
                // }
                File::deleteDirectory($pathFloder);
                DB::rollBack();
                return Response([
                    'status' => true,
                    'message' => '更新失敗',
                ], 404);
            }
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
        $data = Customers::find($id);
        if (is_null($data)) {
            return Response([
                'status' => false,
                'message' => '找不到客戶資料',
            ], 404);
        }

        return Response([
            'status' => true,
            'data' => $data,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) // 該有id

    {
        $id = $request->input('id');
        $data = Customers::find($id);

        if (is_null($data)) {
            return Response([
                'status' => false,
                'message' => '找不到此用戶',
            ], 404);
        }

        $code = $request->input('code');
        $originCode = $data->code;

        if (is_null($code)) {
            return Response([
                'stauts' => false,
                'message' => '客戶代碼不能為空值',
            ], 404);
        }

        if (is_null($originCode)) {
            return Response([
                'status' => false,
                'message' => '找不到原始代碼',
            ], 404);
        }

        $name = $request->input('name');
        $tax = $request->input('tax');
        $mobile = $request->input('mobile');
        $fax = $request->input('fax');
        $address = $request->input('address');
        $contact = $request->input('contact');
        $defective_rate = $request->input('defective_rate');

        try {
            DB::beginTransaction();
            $data->name = $name;
            $data->tax = $tax;
            $data->mobile = $mobile;
            $data->fax = $fax;
            $data->address = $address;
            $data->contact = $contact;
            $data->defective_rate = $defective_rate;
            $data->save();

            DB::commit();
            return Response([
                'stauts' => true,
                'message' => '修改成功',
            ], 200);

        } catch (Exception $e) {
            return Response([
                'status' => false,
                'message' => '更新失敗',
            ], 404);
            DB::rollback();

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customers::find($id);
        $code = $data->code;

        if (is_null($code)) {
            return Response([
                'status' => false,
                'message' => '此代碼錯誤',
            ], 204);
        }

        if (is_null($data)) {
            return Response([
                'status' => false,
                'message' => '找不到此客戶',
            ], 404);
        }

        $pathFloder = '/mnt/mkhPic/mkh-online/' . $code;
        if (strpos(env('APP_NAME'), 'dev') > 0) {
            // 本地端

            $path = dirname($_SERVER['DOCUMENT_ROOT']);
            $pathFloder = $path . '/' . env('APP_NAME') . '/' . $code;
        }

        try {
            File::deleteDirectory($pathFloder);
            DB::beginTransaction();
            $data->delete();

            DB::commit();
            return Response([
                'status' => false,
                'message' => '刪除成功',
            ], 200);

        } catch (Exception $e) {
            DB::rollback();
            return Response([
                'status' => true,
                'message' => '刪除失敗',
            ], 404);
        }
    }
}
