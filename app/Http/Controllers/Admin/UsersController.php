<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

// 引入表单校验请求类
 use App\Http\Requests\AdminUserInsert;

 // 引入模型类
 use App\Models\Userss;
 // 引入自定义的类A
use A;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //加载模版
        // echo "这是用户列表模块";
        // 获取搜索数据
        $k=$request->input("keywords");
        $s = $request->input("keywordss");
        // echo $k;
        // 通过Userss 获取会员列表 分页和搜索
        // // 获取数据 分页
        $user =Userss::where("username","like","%".$k."%")->where('phone','like',"%".$s."%")->paginate(3);
        return view("Admin.Users.index",['users'=>$user,"request"=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo "这是添加界面";
        // 加载模版
        return view("Admin.Users.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserInsert $request)
    {
        //打印所有数据
        // dd($request->all());
        // except 把字段去掉
        $data = $request->except(['repassword','_token']);
        // dd($data);
        // 处理数据 加密密码
        $data['password']=Hash::make($data['password']);
        // dd($data);
        // 封装数据
        $data['status']=1;
        $data['token']= str_random(50);
        if(Userss::create($data)){
            return redirect('/adminuser')->with("success","数据添加成功");
        }else{
            // return back();//阻止跳转
            return redirect('/adminuser/create')->with("error","添加失败");
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
        // echo "会员详情";
        // 获取会员关联的会员详情
        $userinfo = Userss::find($id)->info;
        // dd($userinfo); 
        // 加载模版 分配数据
        return view("Admin.Users.info",['userinfo'=>$userinfo]);
    }

    public function address($id){
        // echo "收货地址";
        // 获取会员关联的会员收货地址
        $address = Userss::find($id)->useraddress;
        // dd($address);
        // 加载模版 分配数据
        return view("Admin.Users.address",['address'=>$address]);
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
        // echo $id;
        // 获取单条数据
        $info = Userss::where("id","=",$id)->first();
        // 加载模版
        return view("Admin.Users.edit",['info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // echo $id;
        // 获取修改后的数据
        // dd($request->all());
        $data=$request->except(['_token','_method','repassword']);
        if(empty($data['password'])){
          return redirect("/adminuser/$id/edit")->with('error','密码不能为空');exit;
        }
        if(Userss::where("id","=",$id)->update($data)){
            return redirect("/adminuser")->with('success','修改成功');
        }else{
            return redirect('/adminuser/$id/edit')->with('error','修改失败');
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
        //
        // echo $id;
        if(Userss::where('id','=',$id)->delete()){
            return redirect('/adminuser')->with('success','删除成功');
        }else{
            return redirect('/adminuser')->with('error','删除失败'); 
        }
    }
    public function del(Request $request){
            $id = $request->input("id");
            // echo $id;
            if(DB::table('users')->where('id','=',$id)->delete()){
                echo 1;
            }else{
                echo 0;
            }
    }
    // 调用自定义函数 func()
    public function func(){
        func();
    }
    // 调用自定义类
    public function cc(){
        // 实例化类A
        $a = new A();
        // 调用方法
        $a->weixin();
    }

    // 调用短信接口的方法
    public function message(){
        sendsphone('13838285985');
    }
}
