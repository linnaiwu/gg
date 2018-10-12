<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 导入DB类
use DB;
// 导入哈希类
use Hash;
class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {

        //获取管理员列表
        $adminuser=DB::table("admin_users")->paginate(4);
        // 加载模版
        return view("Admin.Adminuser.index",['adminuser'=>$adminuser]);
    }

    // 分配角色
    public function rolelist($id){
        // 获取后台管理员id
        // echo $id;
        // 获取管理员信息 通过id获取
        $info= DB::table("admin_users")->where("id",'=',$id)->first();
        // 获取角色信息
        $role = DB::table("role")->get();
        // 获取当前管理员已有的角色信息
        $data = DB::table("user_role")->where("uid",'=',$id)->get();
        // var_dump($data);
        // 判断
        if(count($data)){
            // 遍历角色已有的信息 勾选
            foreach($data as $v){
                $rids[]=$v->rid;
            }
            // 加载分配角色的模版
         return view("Admin.Adminuser.rolelist",['info'=>$info,'role'=>$role,'rids'=>$rids]);
        }else{
            // 否就 array()  空值 没有勾选
            // 加载分配角色的模版 
         return view("Admin.Adminuser.rolelist",['info'=>$info,'role'=>$role,'rids'=>array()]);
        }
    }
    // 保存角色
    public function saverole(Request $request){
        // echo "保存角色"; 向user_role(用户角色表) 数据表插入数据 uid 用户id和rid 角色id
        // 获取uid
        $uid=$request->input('uid');
        // 获取分配的角色信息
        if(!empty($_POST['rids'])){
           $rids = $_POST['rids'];
        }
        // echo $uid; //管理员的id
        // var_dump($rids); //角色表的id
        // 删除当前用户已有的角色
        if(empty($_POST['rids'])){
            // return back()->with('error','请选择管理员级别');
            return redirect("/adminusers")->with("error","未分配角色");
        }
        DB::table("user_role")->where("uid",'=',$uid)->delete();
        // 遍历
        foreach($rids as $key=>$value){
            $data['rid']=$value;
            $data['uid']=$uid;
            // 存入库
            DB::table("user_role")->insert($data);
        }
        return redirect("/adminusers")->with("success","角色分配成功");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模版
        return view("Admin.Adminuser.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取所有的参数
        // dd($request->all());
        $data = $request->except('_token');
        // 用哈希类将 密码加密
        $data['password']=Hash::make($data['password']);
        // dd($data);
        // 存入数据库
        if(DB::table("admin_users")->insert($data)){
            return redirect("/adminusers")->with('success','添加成功');
        }else{
            return redirect("/adminusers/create")->with('error','添加失败');
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
        //执行删除
        if(DB::table("admin_users")->where("id",'=',$id)->delete()){
            return redirect("/adminusers")->with('success','删除成功');
        }else{
            return redirect("/adminusers")->with('error','删除失败');
        }
    }
}
