<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;
class SliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data=DB::table('admin_slides')->get();
        // dd($data);
        //加载模板
        return view('Admin.Sli.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view('Admin.Sli.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a=$request->except(['_token']);
        // dd($a);
        if($request->hasFile('pic')){ 
            $name=time()+rand(1,10000);
            $res=$request->file('pic')->getClientOriginalExtension();
            $path=$request->file('pic')->move(Config::get('app.app_uploads'),$name.'.'.$res);
            $a['pic']=trim(Config::get('app.app_uploads')."/".$name.".".$res,'.');
            if (DB::table('admin_slides')->insert($a)) {
                 return redirect("/slides")->with("success","添加成功");
            }else{
                 return redirect("/slides/create")->with("error","添加失败");

            }
            
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo $id;
        $a=DB::table('admin_slides')->where('id','=',$id)->first();
        // var_dump($a);die;
        return view('Admin.Sli.edit',['data'=>$a]);
        
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
        $info=DB::table("admin_slides")->where('id','=',$id)->first();
        $data=$request->except(['_token','_method']);
        if($request->hasFile('pic')){
        //初始化文件名字
        $name=time()+rand(1,10000);
        // 获取上传文件后缀
        $ext=$request->file('pic')->getClientOriginalExtension();
        // 2.将上传的文件移动到指定目录下并且赋值到path
        $path=$request->file('pic')->move(Config::get('app.app_uploads'),$name.".".$ext);
        // 封装$data
        $data['pic']=trim(Config::get('app.app_uploads')."/".$name.".".$ext,'.');
        // 3.把赋值后的path图片地址上传至数据库
            if(DB::table('admin_slides')->where("id",'=',$id)->update($data)){
                unlink(".".$info->pic);
                return redirect("/slides")->with("success","修改成功");
                }
            }else{
                if(DB::table('admin_slides')->where("id",'=',$id)->update($data)){
                return redirect("/slides")->with("success","修改成功");
            }else{
                return redirect("/slides")->with("error","修改失败");

            }
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
        $aa=DB::table('admin_slides')->where('id','=',$id)->first();
        // var_dump($aa[0]->pic);die;
        
        // echo $pic;die;
        if (DB::table('admin_slides')->where('id','=',$id)->delete()) {
                unlink(".".$aa->pic);
                 return redirect("/slides")->with("success","删除成功");
            }else{
                 return redirect("/slides")->with("error","删除失败");

            }
    }
}
