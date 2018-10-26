<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取数据总条数
        $tot=DB::table("users")->count();
        // 每页显示的数据条数
        $rev = 3;
        //获取数据最大页
        $maxpage=ceil($tot/$rev);
        // 获取参数page
        $page=$request->input('page');
        // select * from users limit 3,3 查询的数据
         // 判断
        if(empty($page)){
            $page=1;
        }
        $offset = ($page-1)*$rev;
        // 准备SQL语句
        $sql = "select * from users limit {$offset},{$rev}";
        // 执行SQL语句
        $data = DB::select($sql);
        // echo $page;
        // 检测为Ajax请求
        if($request->ajax()){
            // echo $page;exit;
            // 单独加载模版 把Ajax 当前页数的数据分配分配过去
            return view("Admin.Adminuserss.test",['data'=>$data]);
        }
        // echo $maxpage;
        $pp = array();
        //遍历
        for($i=1;$i<=$maxpage;$i++){
            $pp[$i]=$i;
        }
        // var_dump($pp);//分页的页数
        
        // 加载模版
        return view("Admin.Adminuserss.index",['pp'=>$pp,'data'=>$data]);
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
        // dd($id);
        DB::table("users")->where("id",'=',$id)->delete();
        return redirect("/adminuserss")->with('success','删除成功');
    }
}
