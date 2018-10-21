<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        //确认订单
        $cart = session('cart');
        $name = session('homename');

        if(empty($name)){
            return redirect('/homelogin');
        }
        $info = DB::table('users')->where('username','=',$name)->first();

        $id = $info->id;

        $addr = DB::table('address')->where('uid','=',$id)->first();
        //判断是否有地址(待加)
        if(empty($addr)){
            return redirect('/');
        }
        

        
        if(empty($cart)){
            return false;
        }
        $total = '';
        $data = [];
        foreach($cart as $k=>$v){
            $info= DB::table('pro_goods')->where('id','=',$v['id'])->first();
            $row['name']= $info->name;
            $row['pic']=$info->pic;
            $row['num']=$v['num'];
            $row['price']=$info->price;
            $row['id']=$v['id'];
            $row['descr']=$info->descr;
            $total+=$info->price*$v['num'];
            $data[] = $row;
        }


       

        return view('Home.Order.index',['cate'=>HomeController::getCatesByPid(0),'data'=>$data,'total'=>$total,'addr'=>$addr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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

    public function  order(Request $request){

         //订单表
         // dd($request->session()->all());
        $name = session('homename'); 
        $aid = $request->input('aid');
        $total =$request->input('total');
        $user = DB::table('users')->where('username','=',$name)->first();
        $data['uid']=$user->id;
        $data['aid']=$aid;
        $data['total']=$total;
        $data['status'] = 0;
        $data['oid'] = date('YmdHis',time()).rand(1000,9999);
        $data['addtime'] = date('Y-m-d H:i:s',time());
        // //获取刚插入的id
        $id = DB::table('order')->insertGetId($data);

        // //订单详情
        $cart = session('cart');
 
        foreach($cart as $k=>$v){
           $datas['oid'] = $id;
           $datas['gid'] = $v['id'];
           $datas['num'] = $v['num'];
           $datas['status'] = 0;
           $price = DB::table('pro_goods')->where('id','=',$v['id'])->value('price');
           $datas['price'] = $price; 
           $result = DB::table('orders')->insert($datas);
        }

         


      

        if($id && $result){
            return redirect('/ordersss/'.$id);
        }
        

    }

    public function orders($id){
        //提交成功待付款页面
        $order = DB::table('order')->where('id','=',$id)->first();

        $address = DB::table('address')->where('id','=',$order->aid)->first();

        return view('Home.Order.orderadd',['cate'=>HomeController::getCatesByPid(0),'order'=>$order,'address'=>$address]);
    }


    public function orderlist(){
        $name = session('homename');
        $info = DB::table('users')->where('username','=',$name)->first();
        $data = DB::table('users')->join('order','order.uid','=','users.id')->join('orders','orders.oid','=','order.id')->join('address','order.aid','=','address.id')->select('order.oid','order.total','order.status','order.addtime','orders.gid','orders.num','address.*','users.id')->get();
        dd($data);
       
        // return view('Home.Order.orderlist',['cate'=>HomeController::getCatesByPid(0),'row'=>$row]);
    }
}
