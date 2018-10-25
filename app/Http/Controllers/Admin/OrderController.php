<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $orderid = '';
        if($request->input('orderid')){
            $orderid =$request->input('orderid');
        }
 
        $info = DB::table('order')->join('users','order.uid','=','users.id')->join('address','order.aid','=','address.id')->select('order.id','order.oid','order.total','order.status','users.username','address.name as aname','address.phone','address.address')->where('order.oid','like','%'.$orderid.'%')->paginate(1);

         $status = ['未支付','发货','已发货','已收货','审核退款,点击退货','退款成功'];
        return view('Admin.Order.index',['order'=>$info,'status'=>$status,'orderid'=>$orderid]);
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
        //订单详情
        $order = DB::table('orders')->where('id','=',$id)->first();
       
         $gid = explode(',',$order->gid);
         $num = explode(',',$order->num);
         $price = explode(',',$order->price);
         $aa = [];
        for($i=0;$i<count($gid);$i++){
            $dd = DB::table('pro_goods')->where('id','=',$gid[$i])->first();
            $dd->num = $num[$i];
            $dd->prices = $price[$i];
            $aa[] = $dd;
       
            }
          
       
        // dd($aa);
        return view('Admin.Order.orders',['data'=>$aa]);
        
        
    
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

    public function status($id){

        $info  =DB::table('order')->where('id','=',$id)->first();

        if($info->status==1){
           if(DB::table('order')->where('id','=',$id)->update(['status'=>2])){
                return redirect('/adminorderlist');
           }
        }
         if($info->status==4){
           if(DB::table('order')->where('id','=',$id)->update(['status'=>5])){
                return redirect('/adminorderlist');
           }
        }
    }

   
}
