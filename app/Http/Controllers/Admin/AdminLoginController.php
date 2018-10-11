<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Hash;
class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //执行退出
        // 销毁session
        $request->session()->pull('name');
        // 跳转
        return redirect("/adminlogin/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载后台登录模版
        return view("Admin.AdminLogin.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取数据
        // dd($request->all());
        // 获取登录的管理员和密码
        $name = $request->input("name");
        $password = $request->input("password");
        // 检测用户名
        $info = DB::table("admin_users")->where("name",'=',$name)->first();
        // var_dump($info);exit;
        if($info){
            // echo "OK";
        // 检测密码
            if(Hash::check($password,$info->password)){
                // echo "Ok";
                // 将用户的信息存储在session里
                session(['name'=>$name]);
                // 1.获取当前登录用户的所有权限信息
                $list = DB::select("select n.name,n.mname,n.aname from user_role as ur,role_node as rn,node as n where ur.rid=rn.rid and rn.nid=n.id and uid={$info->id}");
                // echo "<pre>";
                // var_dump($list);die;
                // 2.初始化权限
                // 让所有的管理员都具有一个公共权限(访问后台首页)
                // AdminController 后台首页访问控制器  index 方法
                $nodelist['AdminController'][] = "index";
                 // (先遍历
                foreach($list as $key=>$value){
                    $nodelist[$value->mname][]=$value->aname;
                    // 如是create方法 添加store 如是edit方法添加update
                    if($value->aname=="create"){
                        $nodelist[$value->mname][]="store";
                    }
                    if($value->aname=="edit"){
                        $nodelist[$value->mname][]="update";
                    }
                }
                // echo "<pre>";
                // var_dump($nodelist);die;
                // 3.把所有的权限信息 存储在session里
                session(['nodelist'=>$nodelist]);
                // 4. 第4步写在中间件
                // 用户 密码一致跳转后台首页
                return redirect("/admin");
            }else{
                return back()->with("error","输入密码有误");
            }
        }else{
            return back()->with('error','管理员名字有误');
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
