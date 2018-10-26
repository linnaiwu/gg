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
        foreach($dataa as $v){
            $id = $v->id; 
        }
        // dd($id);
        $info= DB::table('good_app')->where('gid','=',$id)->paginate(5);
        foreach($info as $v){
            $v->name = DB::table('users')->where('id','=',$v->uid)->value('username');
        }
        // dd($info);
        $xx = ['差评','☆','☆☆','☆☆☆','☆☆☆☆','☆☆☆☆☆'];
        return view("Home.Details.index",['cate'=>$cate,'dataa'=>$dataa,'info'=>$info,'xx'=>$xx]);
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

    public function pls($gid,$oid){

       $info['gid'] =$gid;
       $info['oid'] =$oid;
       $g = DB::table('pro_goods')->where('id','=',$gid)->first();
       $res = DB::table('order')->where('id','=',$oid)->where('status','=','3')->first();
       if(!count($res)){
         return redirect('/homelogin');
       }
       DB::table('order')->update(['status'=>6]);
       return view('Home.Details.pl',['cate'=>HomeController::getCatesByPid(0),'gg'=>$g,'info'=>$info]);



    }

    public function pl(Request $request){
       $data = $request->except('_token');
       // dd($data);
       $data['addtime']=date("Y-m-d H:i:s",time());
       $name = session('homename');
       $data['uid'] = DB::table('users')->where('username','=',$name)->value('id');
       $result = DB::table('good_app')->insert($data);

       if($result){
            return  redirect('/');
       }else{

            return back();
       }


    }
}
