<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;
use App\Http\Requests\AdminShopInsert;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取关联数据  cates(分类表) 和 pro_goods商品表 join方法关联
        $shop=DB::table("pro_goods")->join("cates","pro_goods.cate_id",'=','cates.id')->select('pro_goods.id as gid','pro_goods.name as gname','cates.id as cid','cates.name as cname','pro_goods.pic','pro_goods.descr','pro_goods.price','pro_goods.stock','pro_goods.display','pro_goods.producer')->get();
        // dd($shop);
        // 加载模版
        return view("Admin.Shop.index",['shop'=>$shop]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //先获取类别数据
        $cate = CateController::getcates();
        // dd($cate);//获取分类的顺序

        // 加载添加模版
        return view("Admin.Shop.add",['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminShopInsert $request)
    {
        //获取商品添加的数据
        // dd($request->all());
        // 删除_token字段
        $data = $request->except("_token");
        // 文件上传
        if($request->hasFile('pic')){
            // 初始化图片名字
            $name = time()+rand(1,10000);
            // 获取后缀
            $ext=$request->file('pic')->getClientOriginalExtension();
            //移动文件到指定目录下
            // $request->file("pic")->move("./uploads/".date("Y-m-d"),$name.'.'.$ext);
            $request->file("pic")->move(Config::get('app.app_uploads'),$name.'.'.$ext);
            //封装$data
            $data['pic']=trim(Config::get('app.app_uploads')."/".$name.".".$ext,'.');
            // dd($data);
        }
        // dd($request->all());
        // 存入数据库
        if(DB::table("pro_goods")->insert($data)){
            return redirect("/adminshop")->with("success","商品添加成功");
        }else{
             return redirect("/adminshop/create")->with("error","商品添加失败");
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
        // echo $id;
        // 获取需要修改的数据
        $info=DB::table("pro_goods")->where("id",'=',$id)->first();
        // dd($info);
        return view("Admin.Shop.edit",['info'=>$info]);
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
        // echo $id;
        // 获取需要修改的数据
        $info=DB::table("pro_goods")->where("id",'=',$id)->first();
        // 去除_token和_method
        $data=$request->except(['_token','_method']);
        // 判断
        if($request->hasFile("pic")){
            // 新图上传
            // 初始化图片名字
            $name = time()+rand(1,10000);
            // 获取后缀
            $ext = $request->file('pic')->getClientOriginalExtension();
            // 移动文件到指定目录下
            $request->file("pic")->move(Config::get("app.app_uploads"),$name.'.'.$ext);
            // 封装$data
            $data['pic']=trim(Config::get('app.app_uploads')."/".$name.".".$ext,'.');
            if(DB::table("pro_goods")->where("id",'=',$id)->update($data)){
                // 旧图删除
                unlink(".".$info->pic);
                return redirect("/adminshop")->with("success","商品修改成功");
            }
            
        }else{
            // 图片不修改
             if(DB::table("pro_goods")->where("id",'=',$id)->update($data)){
                return redirect("/adminshop")->with("success","商品修改成功");
            }else{
                return redirect("/adminshop")->with("error","商品未修改");
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
        // 删除
        // echo $id;
        $info=DB::table("pro_goods")->where("id",'=',$id)->first();
        if(DB::table("pro_goods")->where('id','=',$id)->delete()){
            // 把图片删除
            unlink(".".$info->pic);
            return redirect("/adminshop")->with("success",'删除商品成功');
        }
    }
}
