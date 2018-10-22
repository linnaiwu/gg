<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=DB::table('admin_notice')->select()->get();
        return view('Admin.Notice.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view("Admin.Notice.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except("_token");
        if(DB::table('admin_notice')->insert($data)){
            return redirect("/notice")->with("success",'添加成功');
        }else{
            return redirect("/notice")->with("success",'添加失败');
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
        $data=DB::table('admin_notice')->where('id','=',$id)->first();
        // dd($data);
        return view('Admin.Notice.edit',['data'=>$data]);
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
        // dd($request->all());
        $info=$request->only('title','descr','status');
        // dd($info);
        if(DB::table('admin_notice')->where('id','=',$id)->update($info)){
            return redirect("/notice")->with('success','修改成功');
        }else{
            return redirect("/notice")->with('error','修改失败');
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
         if(DB::table("admin_notice")->where('id','=',$id)->delete()){
            return redirect("/notice")->with('success','删除成功');
        }else{
            return redirect("/notice")->with('error','删除失败');
        }
    }
}
