<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入表单验证
use App\Http\Requests\HomeResetinsert;
use App\Http\Requests\PhoneResetinsert;
use DB;
use Hash;
use Mail;


class HomeLogincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return view("home.login.login");
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
        // //
        // $data=$request->all();
        // dd($data);
         $name=$request->input('username');
        $password=$request->input('password');
        // dd($password);
        $info=DB::table("users")->where("username",'=',$name)->first();
        if($info){
            if(Hash::check($password,$info->password)){
                //将登录用户名存入session
                 session(['homename'=>$name]);
                 
                 //跳转后台首页
                  return redirect("/home");
                }else{
                    return back()->with('error','密码有误');
                }
        }else{
            // echo "-------";
            return back()->with('error','会员名有误');
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


     //邮件测试发送  $id,$token,$mail 接收方
    public function sendMail($id,$token,$mail){
        // Home.Register.a 模板  ['id'=>$id,'token'=>$token] 分配参数 
        // $message 消息生成器
        //在闭包函数内部不能直接使用闭包函数外部的变量  如果想使用 use 导入
        Mail::send('Home.login.a',['id'=>$id,'token'=>$token],function($message)use($mail){
            $message->to($mail);
            $message->subject('2期密码重置');
        });
        return true;
    }

    //找回密码
    public function forget()
    {
      return view("home.login.forget");
    }

     //邮箱找回密码
    public function emailget()
    {
      return view("home.login.emailget");
    }

    //执行邮箱找回
    public function doemailget(Request $request)
    {
      $email=$request->input('email');
      // dd($data);
      //获取数据库的数据
      $info=DB::table("users")->where("email",'=',$email)->first();
      if(count($info)>0){
           //发送邮箱找回密码
        $res=$this->sendMail($info->id,$info->token,$email);
     if($res){
    return redirect("/emailget")->with('sss',"发送请求成功,请前往邮箱进行下一步");
        }else{
     return redirect("/emailget")->with('errsend',"发送请求失败,请检查网络是否稳定"); 
        }
      }else{
        // echo "不存在此邮箱";
        return redirect("/emailget")->with('error',"不存在此邮箱,请认真填写");

      }
    }
    //重置密码
    public function reset(Request $request){
        // echo $request->input('id').":".$request->input('token');
        $id=$request->input('id');
        $info=DB::table("users")->where("id","=",$id)->first();
        $token=$request->input('token');
        // 对比 加载密码重置模板
        if($token==$info->token){
            return view("Home.Login.reset",['id'=>$id]);
        }else{
            return view('home.login.b');
        }
    }
    //执行重置密码
        public function doreset(HomeResetinsert $request){

        $id=$request->input('id');
        $data['password']=Hash::make($request->input('password'));
        $data['token']=rand(1,10000);
        // dd($id);
        //执行密码修改
        if(DB::table("users")->where("id",'=',$id)->update($data)){
             return redirect("/homelogin")->with("reset","修改密码成功,请登录");
        }else{
            echo "修改失败";
        }
    }

    //加载短信发送模板
    public function phone(){

      return view("home.phone.phone");
    }

    //执行短信发送
    public function dophone(Request $request){
       // sendsphone('18818846242');
        $phone=$request->input('phone');
        // echo $phone;
            // echo 123;exit;
           $userdd=DB::table("users")->where("phone",'=',$phone)->first();
           if($userdd){
            //发送手机号码
                // sendsphone($phone);
            echo 1;
           }else{
                echo 2;
           }
    }
    //短信重置密码
    public function dodophone(PhoneResetinsert $request){
        // dd("--");
    //获取模板的验证码
        $code=$request->input('code');
     //获取cookie里的验证码
        $ecode=$request->cookie('ecode');
        //加密传过来的密码
     $password=Hash::make($request->input('password'));
     $phone=$request->input('phone');
        if($code==$ecode){
        DB::table("users")->where("phone",'=',$phone)->update(['password'=>$password]);
        return redirect("/phone")->with('pp','～～修改码密码成功,请登录～～');
        }else{
          return redirect("/phone")->with('yanz','验证码不对');
        }
 
    }

}
