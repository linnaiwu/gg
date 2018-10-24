<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //商品分类
    $cate = HomeController::getCatesByPid(0);
    if(session('homename')){
        $session=session('homename');
     $kk=DB::table('users')->select('id')->where('username','=',$session)->first();
     $id=$kk->id;
     $data=DB::table("address")->where('uid','=',$id)->get();

        return view("home.me.address",['data'=>$data,'cate'=>$cate]);
    }else{
        return redirect("/homelogin");
    }
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
        $session=session('homename');
        // dd($session);
        $city=$request->input('city');
         $cc=strtok($city,'#');
        $addr=$request->input('addr');
       $str=str_replace(',','', $cc);
       $data['address']=$str.$addr;
       $data['name']=$request->input('name');
       $data['phone']=$request->input('phone');
       $data['status']=1;

    if(session('homename')){
          // dd($str);
        $kk=DB::table('users')->select('id')->where('username','=',$session)->first();
        // dd($kk);
        $data['uid']=$kk->id;
        // dd($data);
        if(strpos($str,'--请选择--') !==false){
            return redirect("/address")->with('en',"请认真填写配送地址");
            }else{
            // dd($data);
        $tt=DB::table("address")->insert($data);
        return redirect('/address');
            }
        }else{
            return redirect('/homelogin');
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
    //ajax选择地址
    public function ajaxaddr(Request $request){
        // echo "1";
        $upid=$request->input('upid');
        $data=DB::table("district")->where("upid",'=',$upid)->get();

       echo json_encode($data);
    }
    //ajax删除
    public function addrdel(Request $request){
        $id=$request->input("id");
        // echo $id;
        if(DB::table("address")->where("id",'=',$id)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function status(Request $request){
        $id=$request->input('id');
        $db=DB::table("address")->where('id','=',$id)->first();
        $status=DB::table("address")->select('status')->where('uid','=',$db->uid)->get();
        // echo $uid;
       if($db->status==1){
          foreach($status as $key=>$val){
          DB::table("address")->where('uid','=',$db->uid)->update(['status'=>'1']);
         }
           DB::table("address")->where('id','=',$id)->update(['status'=>'2']);
           echo "1";
        }else{
            echo "2";
         // foreach($status as $key=>$val){
         //  DB::table("address")->where('uid','=',$db->uid)->update(['status'=>'1']);
         // }
         // DB::table("address")->where('id','=',$id)->update(['status'=>'1']);
        }

  
    }
}
