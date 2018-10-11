<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 导入DB类
use DB;
// 导入哈希类
use Hash;
class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {

        //获取管理员列表
        $adminuser=DB::table("admin_users")->paginate(4);
        // 加载模版
        return view("Admin.Adminuser.index",['adminuser'=>$adminuser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模版
        return view("Admin.Adminuser.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取所有的参数
        // dd($request->all());
        $data = $request->except('_token');
        // 用哈希类将 密码加密
        $data['password']=Hash::make($data['password']);
        // dd($data);
        // 存入数据库
        if(DB::table("admin_users")->insert($data)){
            return redirect("/adminusers")->with('success','添加成功');
        }else{
            return redirect("/adminusers/create")->with('error','添加失败');
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
        //执行删除
        if(DB::table("admin_users")->where("id",'=',$id)->delete()){
            return redirect("/adminusers")->with('success','删除成功');
        }else{
            return redirect("/adminusers")->with('error','删除失败');
        }
    }
}
