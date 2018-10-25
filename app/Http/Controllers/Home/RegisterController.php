<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入表单验证
use  App\Http\Requests\HomeUserinsert;
use DB;
use Hash;
//导入邮箱
use Mail;
//导入三方类
use Gregwar\Captcha\CaptchaBuilder;

class RegisterController extends Controller
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
//测试邮件发送
    public function send()
    {
        //邮件消息生成器 $message
        Mail::raw('成功了!',function($message){
       //接收方
       $message->to("m18818846242@163.com");
       //发送主题
        $message->subject('测试信息');
    });
        echo "1";

     }


         //邮件测试发送  $id,$token,$mail 接收方
    public function sendMail($id,$token,$mail){
        // Home.Register.a 模板  ['id'=>$id,'token'=>$token] 分配参数 
        // $message 消息生成器
        //在闭包函数内部不能直接使用闭包函数外部的变量  如果想使用 use 导入
        Mail::send('Home.Register.a',['id'=>$id,'token'=>$token],function($message)use($mail){
            $message->to($mail);
            $message->subject('o2o28goods');
        });
        return true;
    }

    //激活方法
    public function jihuo(Request $request){
        //获取id和token
        $id=$request->input('id');
        $info=DB::table("users")->where("id",'=',$id)->first();
        $token=$request->input('token');
        // echo $id.":".$token;
        //对比邮件token是否和数据的token值一致
        if($token==$info->token){
            //封装修改的数据
            $data['status']=2;
            $data['token']=rand(1,1000000);
            DB::table("users")->where("id",'=',$id)->update($data);
            // echo "激活成功";
            return redirect("/pull");
        }

    }

     //测试验证码
     public function code(){
        ob_clean(); //清除操作
        //生成验证码builder对象 配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 130, $height = 50, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        session(['fcode'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        //输出验证码
        $builder->output();
        // die;
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

      return view("home.register.register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeUserinsert $request)
    {
        // $data=$request->all();
        // dd($data);
        //获取输入的校验码
        $vcode=$request->input('vcode');
        //获取系统的验证码
        $fcode=session('fcode');
        // echo $vcode.":".$fcode;
        //对比校验码
        if($vcode==$fcode){
            //注册用户
            //获取需要插入的数据
            $data=$request->only(['email','password','username','phone']);
            //密码加密
            $data['password']=Hash::make($data['password']);

            $data['status']=1;//1 未激活 2 代表已经激活
            $data['token']=rand(1,10000);
            // dd($data);
            //入库
            $id=DB::table("users")->insertGetId($data);
            if($id){
                // echo "注册成功";
                //发送邮件激活用户 $id 插入数据id   $token 插入数据的token $mail 接收方
                $res=$this->sendMail($id,$data['token'],$data['email']);
                if($res){
                    
            return redirect("/register/create")->with('zhuc','～～注册成功,请登录邮箱激活～～');
                }
            }   
        }else{
            return back()->with('yanz',':&nbsp;&nbsp;输入有误');
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
