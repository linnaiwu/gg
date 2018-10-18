<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//表单验证
use App\Http\Requests\Homelinkinsert;


class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getCatesByPid($pid){
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
        $cate = self::getCatesByPid(0);
        $data=DB::table('link')->where('display','=',1)->get();

        return view('Home.Link.index',['cate'=>$cate,'data'=>$data]);
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
    public function store(Homelinkinsert $request)
    {
        $data=$request->except(['_token']);
        // dd($data);
        if(DB::table('link')->insert($data)){
            return redirect("/link")->with("success","添加成功,待审核");
        }else{
            return redirect("/link")->with("success","添加失败,请认真填写");
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
        //
    }
}
