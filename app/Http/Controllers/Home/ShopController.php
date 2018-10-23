<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  public static function getCatesByPid($pid){
    //     // 获取数据
    //     $res = DB::table("cates")->where('pid','=',$pid)->get();
    //     $data = [];
    //     // 遍历数据
    //     foreach($res as $key=>$value){
    //         // 获取父类下的子类信息
    //         $value->dev=self::getCatesBypid($value->id);
    //         $data[] = $value;
    //     }
    //     return $data;
    // }
    public function index(Request $request)
    {
        // 获取分类数据
        $cate = HomeController::getCatesByPid(0);
       // 获取广告数据
        $data = DB::table('Admin_slides')->select()->get();
        // 公告数据
        $a = DB::table('Admin_gg')->select()->get();
        // var_dump($data);
        // dd($cate);
        $gg = DB::table("admin_notice")->select()->get();
        // 获取商品数据
        $goods = DB::table("pro_goods")->select()->get()->where("display",'=','1');
        // 加载模版
        return view("Home.Shop.index",['cate'=>$cate,'data'=>$data,'a'=>$a,'gg'=>$gg,'goods'=>$goods]);
      
       
    }

         // $res=DB::table("pro_goods")->join("cates","pro_goods.cate_id",'=','cates.id')->select('pro_goods.*','cates.id as cid')->get()->where("cate_id",'=',$id);
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $ss = DB::table("pro_goods")->('catea','peo_goods.cate_id','=','cates.id')->select('')->get();
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
        // echo $id;        
        // echo 1;
         $cate = HomeController::getCatesByPid(0);
        // 加载模版

        // $goods=DB::table("cates")->where("pid",'=',$id)->get();
        // $data ='';  
        // foreach($goods as $k=>$v){
           $data=  DB::table("pro_goods")->where('cate_id','=',$id)->get();
        // }

        // dd($data);
        return view("Home.Shop.add",['cate'=>$cate,'data'=>$data]);
    }
     // $res=DB::table("pro_goods")->join("cates","pro_goods.cate_id",'=','cates.id')->select('pro_goods.*','cates.id as cid')->get()->where("cate_id",'=',$id);

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
        echo $id;
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
    public function sm(Request $request){
      // echo "23";
    }
}
