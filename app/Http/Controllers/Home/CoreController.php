<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // 查找用户id
        $name = session("homename");
        // dd($name);
        $id = DB::table("users")->where('username','=',$name)->value('id'); 
        // dd($id);       
        // 分类数据
        $data = DB::table("address")->where('uid','=',$id)->get();
        // dd($data);
        // 加载模版
        return view("Home.Core.index",['cate'=>HomeController::getCatesByPid(0),"data"=>$data]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo "123";
        // 加载添加地址模版
        return view("Home.Core.add",['cate'=>HomeController::getCatesByPid(0)]);
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
        // 判断是否填写收货人
        if(empty($request['name'])){
            return back()->with('error','请输入收货人姓名');
        }
       
        if(empty($request['phone'])){
            return back()->with('error','请输入收货人手机');
        }
         if(empty($request['address'])){
            return back()->with('error','请输入收货地址');
        }
     // 消除_token字段
        $data = $request->except(["_token"]);
        // 查找用户id
        $name = session("homename");
        // dd($name);
        $info = DB::table("users")->where('username','=',$name)->value('id');
        $data['uid'] =$info;
        // dd($data); 
        if(DB::table("address")->insert($data)){
            return redirect("/core")->with('添加成功');
        }else{
            return redirect("/core/create")->with("添加失败");
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
        // echo "11";
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
    public function die(Request $request){
        dd($request->all());
    }
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
