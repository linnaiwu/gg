<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
class RolelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取角色信息
        $role=DB::table("role")->get();
        // 加载模版
        return view("Admin.Rolelist.index",['role'=>$role]);
    }
    // 分配权限
    public function auth($id){
        // 获取当前角色
        $role=DB::table('role')->where('id','=',$id)->first();
        // 获取所有权限
        $auth=DB::table("node")->get();
        // 获取当前角色已有的权限列表
        $data=DB::table("role_node")->where('rid','=',$id)->get();
        // 判断
        if(count($data)){
            // 遍历
            foreach($data as $v){
                $nids[]=$v->nid;
            }
            // 加载分配权限列表
            return view("Admin.Rolelist.auth",['role'=>$role,"auth"=>$auth,'nids'=>$nids]);
        }else{
            // 赋值为空数组
            return view("Admin.Rolelist.auth",['role'=>$role,"auth"=>$auth,'nids'=>array()]);
        }
    }
    // 保存权限
    public function saveauth(Request $request){
        // 在模板通过隐藏域发送角色id
        // 向role_node表插入数据 rid 角色id  nid 节点id
        $rid=$request->input("rid");
        // 获取nids
        if(empty($_POST['nids'])){
            return back()->with("error","请分配权限");
        }
        $nids=$_POST['nids'];
        // var_dump($nids);die;
        // 删除当前角色已有的权限
        DB::table("role_node")->where("rid",'=',$rid)->delete();
        // 遍历
        foreach ($nids as $key => $value) {
            // 存入数据库
            $data['rid']=$rid;
            $data['nid']=$value;

            // 插入
            DB::table("role_node")->insert($data);
        }
        return redirect("/rolelist")->with('success',"权限分配成功");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("Admin.Rolelist.add");
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
        // 取出_token字段
        $data=$request->except("_token");       
        // dd($data); 
        if(DB::table('role')->insert($data)){
            return redirect("/rolelist")->with("success","角色添加成功");
        }else{
            return redirect("/rolelist/create")->with("error","角色添加失败");
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
        // echo $id;
        // $data=DB::table('role')->join("user_role",'role.id','=','user_role.rid')->where('id','=',$id)->get();
        // dd($data);
        if(DB::table('role')->where('id','=',$id)->delete()){
            return redirect("/rolelist")->with("success","角色删除成功");
        }else{
            return redirect("/rolelist")->with("error",'角色删除失败');
        }
    }
}
