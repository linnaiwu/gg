<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\MeSafeinsert;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //个人账户
    public function index()
    {
        return view("home.me.user");
    }

    //账号安全管理
    public function safe(){
      if(session('homename')){
        $name=session("homename");
        $users=DB::table("users")->where("username",'=',$name)->first();
        // dd($users->id);
        return view("home.me.safe",['users'=>$users]);
        }else{
            return redirect("/homelogin");
        }
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
    //修改手机号,邮箱
    public function store(Request $request)
    {
        $session=session("homename");
         $phone=$request->input("phone");
             // dd("$phone");            
        if($phone !=null){
          if(preg_match("/^1([38][0-9]|4[579]|5[0-3,5-9]|6[6]|7[0135678]|9[89])\d{8}$/",$phone)){
          $dd=DB::table("users")->where("phone",'=',$phone)->get();
            $data=DB::table("users")->select('phone')->get();
         if(count($dd)>0){
                // echo "已存在此号码";
             return redirect("/safe")->with('cunz','已存在此手机号请更换');            
            }else{
                // return redirect("/safe")->with('ephone','已存在此电话号码');
            DB::table("users")->where("username",'=',$session)->update(['phone'=>$phone]);
             return redirect("/safe")->with('phone','修改手机号成功');
            }

          }else{
            return redirect("/safe")->with('ephone','手机号格式不对');
          }
  
        }else{
          $email=$request->input("email");
     if(preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/",$email)){
        $el=DB::table("users")->where("email",'=',$email)->get();
        if(count($el)>0){
            return redirect("/safe")->with('eer','此邮箱已存在请更换'); 
        }else{
            DB::table("users")->where("username",'=',$session)->update(['email'=>$email]);
            return redirect("/safe")->with('email','修改邮箱成功');
        }

    }else{
         // echo "邮箱不匹配";
        return redirect("/safe")->with('eer1','邮箱格式不正确');
    }
           
            // dd($email);

        };
    }

    public function mecode(MeSafeinsert $request){
        $passworded=$request->input('passworded');
        $password=Hash::make($request->input('password'));
        // dd($passworded);
        $user=session("homename");
       $info=DB::table("users")->where("username",'=',$user)->first();
       if(Hash::check($passworded,$info->password)){
            // echo "ok";
        DB::table("users")->where('id','=',$info->id)->update(['password'=>$password]);
        return redirect("/pull");
       }else{
        return redirect("/safe")->with('ecode','原密码不对,请重新输入');
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
