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

        $addr = DB::table('address')->where('uid','=',$id)->where('status','=','2')->first();
        //判断是否有地址(待加)
        if(!count($addr)){
            return redirect('/address');
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
            $price[] = DB::table('pro_goods')->where('id','=',$v['id'])->value('price');
            $gid[] = $v['id'];
            $num[] = $v['num'];
        }
        // dd($price);
        $datas['gid'] = implode(',',$gid);
        $datas['num'] = implode(',',$num);
        $datas['oid'] = $id;
        $datas['status'] = 0;
        $datas['price'] = implode(',',$price);
        $result = DB::table('orders')->insert($datas);

        

      

        if($id && $result){
            $request->session()->pull('cart');
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
        $data = DB::table('users')->join('order','order.uid','=','users.id')->join('orders','orders.oid','=','order.id')->join('address','order.aid','=','address.id')->select('order.oid','order.total','order.status','order.addtime','orders.gid','orders.num','address.*','users.id','orders.price','order.id as sid')->get();

        // var_dump($data);die;
        $datas=[];
       foreach($data as $k=>$v){
            if($info->id==$v->id){
                $gid =explode(',',$v->gid);
                $num =explode(',',$v->num);
                $price =explode(',',$v->price);
                foreach($gid as $key=>$value){
                  $v->dev[$key] = DB::table('pro_goods')->where('id','=',$value)->first();
                  $v->dev[$key]->num = $num[$key];
                  $v->dev[$key]->price = $price[$key];
                }
                $datas[] = $v;
            }

       }
       // dd($datas);
   
       $status = ['立即付款','待发货','确认收货','交易完成'];
       
        return view('Home.Order.orderlist',['cate'=>HomeController::getCatesByPid(0),'data'=>$datas,'status'=>$status]);
    }


    public function status($id){

    
        // echo $id;
        $info = DB::table('order')->where('id','=',$id)->first();
        
        if($info->status==0){
            if(DB::table('order')->where('id','=',$id)->update(['status'=>1])){
               $data= DB::table('orders')->where('oid','=',$info->id)->first();
               $gid =explode(',',$data->gid);
               $num = explode(',',$data->num);
               for($i=0;$i<count($gid);$i++){
                $n = DB::table('pro_goods')->where('id','=',$gid[$i])->value('stock');
                $stock = $n-$num[$i];
                DB::table('pro_goods')->where('id','=',$gid[$i])->update(['stock'=>$stock]);
               
            }
             return redirect('/orderlist');
        }
    }

    if($info->status==2){
       if(DB::table('order')->where('id','=',$id)->update(['status'=>3])){
            return redirect('/orderlist');
       }

    }
}

 public function del($id){
     
        $info = DB::table('order')->where('id','=',$id)->first();
        if(DB::table('order')->where('id','=',$id)->delete()){
             DB::table('orders')->where('oid','=',$id)->delete();
               
            return redirect('/orderlist');
        }

    }
        
    
       
    
}
