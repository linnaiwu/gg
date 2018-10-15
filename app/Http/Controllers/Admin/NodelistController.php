<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
class NodelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取权限信息
        $nodelist=DB::table("node")->get();
        // 加载模版
        return view("Admin.Nodelist.index",['nodelist'=>$nodelist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模版
        return view("Admin.Nodelist.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
         if(empty($request['name'])){
            return back()->with("error",'权限名字不能为空');
        }
        if(empty($request['mname'])){
            return back()->with("error",'控制器不可以为空');
        }
        if(empty($request['aname'])){
            return back()->with("error",'方法不能为空');
        }
        
        //权限添加
        // echo "OK";die;
        $data=$request->except("_token");
        $data['status']='0';
        // dd($data);
        // 存入数据库
        if(DB::table("node")->insert($data)){
            return redirect("/nodelist")->with("success","权限添加成功");die;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改
    public function show($id)
    {
        // echo "修改";
         $row=DB::table("node")->where("id",'=',$id)->first();
        return view("Admin.Nodelist.edit",['row'=>$row]);
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
        //修改后
        // echo "OK";
        // dd($request->all());
         $data = $request->except(["_token","_method"]);
        // dd($data);
        if(DB::table("node")->where("id",'=',$id)->update($data)){
            return redirect("/nodelist")->with("success",'权限修改成功'); 
        }else{
            return redirect("/nodelist")->with("error",'权限修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 删除
    public function destroy($id)
    {
        // echo "Ok";
         // 直接删除
        if(DB::table("node")->where('id','=',$id)->delete()){
            return redirect("/nodelist")->with('success','删除成功');
        }else{
            return redirect("/nodelist")->with('error','删除失败');
        }
    }
}
