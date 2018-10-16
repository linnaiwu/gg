<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 导入DB
use DB;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 调整类别顺序
    public static function getcates(){
            $cate = DB::table("cates")->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy("paths")->get();
            // 加分隔符
            // 先遍历数据
            foreach($cate as $key=>$value){
                // echo $value->path."<br>";
                // 转换为数组
                $arr=explode(",",$value->path);
                // echo "<pre>";
                // var_dump($arr);
                // 获取逗号个数
                $len=count($arr)-1;
                // 给当前分类添加分隔符
               $cate[$key]->name = str_repeat("--| ",$len).$value->name;
        }
        return $cate;
    }
    public function index(Request $request)
    {
        //
        // $cate = DB::table("cates")->get();
        // 调整类别顺序
        // $cate = DB::select("select *,concat(path,',',id) as paths from `cates` order by paths;");
        // 获取搜索的关键词
        $k = $request->input("keywords");
        // 转换连贯方法
        $cate = DB::table("cates")->select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like',"%".$k."%")->orderBy("paths")->paginate(4);
        // 加分隔符
        // 先遍历数据
        foreach($cate as $key=>$value){
            // echo $value->path."<br>";
            // 转换为数组
            $arr=explode(",",$value->path);
            // echo "<pre>";
            // var_dump($arr);
            // 获取逗号个数
            $len=count($arr)-1;
            // 给当前分类添加分隔符
           $cate[$key]->name = str_repeat("--| ",$len).$value->name;
        }
        // dd($cate);
        // 加载模版 分配数据
        return view("Admin.Cate.index",['cate'=>$cate,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取分类信息
        $cate = DB::table("cates")->get();
        //加载模版
        return view("Admin.Cate.add",['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行分类添加
        // dd($request->all());
        // 判断分类名字是否为空
        if(empty($request['name'])){
            return back()->with("error",'请输入分类名字');
        }
        // 删除_token字断
        $data = $request->except(["_token"]);
        // 区分$pid
        // 获取pid
        $pid = $request->input("pid");
        // 判断
        if($pid==0){
            // 添加的是顶级分类
            // 给path字段赋值
            $data['path'] = '0';
            // dd($data);
        }else{
            // 添加的是顶级分类
            // 获取父类信息
            $info = DB::table('cates')->where('id','=',$pid)->first();
            // 拼接path
            $data['path'] = $info->path.','.$info->id;
            // dd($data);
        }

        // 存入数据库
        if(DB::table("cates")->insert($data)){
            return redirect("/admincate")->with("success",'分类添加成功');
        }else{
            return redirect("/admincate/create")->with("success",'分类添加失败');
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
         // echo $id;
         $row=DB::table("cates")->where("id",'=',$id)->first();
         return view("Admin.Cate.edit",['row'=>$row]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        // echo "OJK";
        // dd($request->all());
        $data = $request->except(["_token","_method"]);
        // dd($data);
        if(DB::table("cates")->where("id",'=',$id)->update($data)){
            return redirect("/admincate")->with("success",'分类修改成功');
        }else{
            return redirect("/admincate")->with("error",'分类修改失败');
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
        // echo $id;
        // 获取当前分类下是否有子类 子类个数
        $res = DB::table('cates')->where("pid",'=',$id)->count();
        // echo $res;
        if($res>0){
            return redirect("/admincate")->with("error",'请先删除子类');
        }
        // 直接删除
        if(DB::table("cates")->where('id','=',$id)->delete()){
            return redirect("/admincate")->with('success','删除成功');
        }else{
            return redirect("/admincate")->with('error','删除失败');
        }
    }
}
