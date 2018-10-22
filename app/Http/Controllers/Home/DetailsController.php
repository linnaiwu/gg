<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $cate = HomeController::getCatesByPid(0);
         // 获取所有商品数据
        $goods = DB::table("pro_goods")->select()->get();
         // 根据商品id查找商品
        $dataa[0] = DB::table("pro_goods")->select()->first(); 
        // 加载模版
        // dd($dataa);
        return view("Home.Details.index",['cate'=>$cate,'dataa'=>$dataa,"goods"=>$goods]);
        
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
        // dd($id);
        $cate = HomeController::getCatesByPid(0);
        // 加载模版
        $dataa[] = DB::table("pro_goods")->where('id','=',$id)->first(); 
        // dd($dataa);
        return view("Home.Details.index",['cate'=>$cate,'dataa'=>$dataa]);
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
