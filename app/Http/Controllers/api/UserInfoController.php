<?php

namespace App\Http\Controllers\api;
use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = DB::table('users');
        return Response([
            'status'=>true,
            'data'  =>$data,
        ]);
        // return Response($users, Response::HTTP_CREATED);
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
        $input['password']= Hash::make($request->password);

        try{
            DB::beginTransaction();
            $users = Users::create($input);

        }catch(Exception $e){
            DB::rollBack();
            return Response([
                'status' => false,
                'message'=> '新增失敗'
            ],404);
        }
        DB::commit();
        return Response([
            'status' => 'true',
            'message'=> '新增成功',
        ],200);
        // return Response($users, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $account = $request->input('account');
        $pwd = $request->input('password');

        $user = Users::where('account', '=', $account)->get()->first();
        if(is_null($user)){
            return Response([
                'status'=> true,
                'message'=>'沒有這個人'
            ],404);
        }

        if (Hash::check($pwd, $user['password']))
        {
            // return \response($user, Response::HTTP_CREATED);
            // 也可以自行設定 HTTP code
            $date = Carbon::parse($user->created_at);

            $data = [];
            $data['account'] = $user->account;
            $data['api_token'] = $user->api_token;
            $data['model'] = $user->model;
            $data['status'] = $user->status;
            $data['create_at'] = $date->format('Y-m-d');

            return Response([
                'status'=> true,
                'data'=> $data,
            ],200);


        }
        else{
            return Response([
                'status' => false,
                'message'=> '沒權限登入'
            ],404);
        }
// Response::HTTP_INTERNAL_SERVER_ERROR


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
