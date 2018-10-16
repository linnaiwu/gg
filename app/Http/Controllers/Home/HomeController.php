<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function getCatesByPid($pid){
        // 获取数据
        $res = DB::table("cates")->where('pid','=',$pid)->get();
        $data = [];
        // 遍历数据
        foreach($res as $key=>$value){
            // 获取父类下的子类信息
            $value->dev=self::getCatesBypid($value->id);
            $data[] = $value;
        }
        return $data;
    }
    public function index()
    {
        // 获取分类数据
        $cate = self::getCatesByPid(0);
        // 获取广告数据
        $data = DB::table('Admin_slides')->select()->get();
        // 公告数据
        $a = DB::table('Admin_gg')->select()->get();
        // var_dump($data);
        // dd($cate);
        // 获取无限分类的数据
        // 加载模版
        return view("Home.Home.index",['cate'=>$cate,'data'=>$data,'a'=>$a]);
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
    }
}
