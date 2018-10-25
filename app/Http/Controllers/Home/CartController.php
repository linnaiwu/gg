<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = session('cart');
        // dd($data);
        if(empty($data)){
            $data = [];
        }
        $total = '';
        $datas = [];
        //遍历商品
        foreach($data as $k=>$v){
          //利用id查出商品
          $info  =  DB::table('pro_goods')->where('id','=',$v['id'])->first();
          //组装成数组
          $row['name'] = $info->name;
          $row['pic'] = $info->pic;
          $row['num'] = $v['num'];
          $row['price'] = $info->price;
          $row['id'] = $v['id'];
          $total+=$row['price']*$row['num'];
          
          $datas[] = $row;
        }

        // dd($row);
      //分配数据
       return view('Home.Cart.index',['cate'=>HomeController::getCatesByPid(0),'data'=>$datas,'total'=>$total]);
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
          $data =$request->except('_token');

          if(!$this->Carts($data['id'])){
            
            $request->session()->push('cart',$data);
          }else{
              $info = DB::table('pro_goods')->where('id','=',$data['id'])->first();
              $cart = session('cart');
              $num = $data['num'];
              foreach($cart as $k=>$v){
                if($data['id']==$v['id']){
                $cart[$k]['num'] += $num;
                if($cart[$k]['num']>$info->stock){
                    return back()->with('error','库存不足');
                }
                } 
               
              }
             
              session(['cart'=>$cart]);
          
          }

          if(!empty($request->input('a'))){
                return back()->with('success','加入购物车成功');
          }

         return redirect('/Cart');
          
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
    //购物车去重
    public  function Carts($id){
        $cart = session('cart');
        //判断购物车是否为空
        if(empty($cart)) return false;

        foreach($cart as $k=>$v){
            if($v['id']==$id){
               return true;
            }
        }
    }

    public function jia(Request $request){
        $id = $request->input('id');
        $n1 = $request->input('num');
        $info= DB::table('pro_goods')->where('id','=',$id)->first();
        $str = $info->stock;

        $cart = session('cart');

        foreach($cart as $k=>$v){

            if($v['id']==$id){
                 $cart[$k]['num']=$n1;
                 session(['cart'=>$cart]);
                 return 1;       
        }

       
       
    }
}

    public function jian(Request $request){
        $id = $request->input('id');
        $n2 = $request->input('num');
       
        $cart = session('cart');

        foreach($cart as $k=>$v){

            if($v['id']==$id){
                 $cart[$k]['num']=$n2;
                 session(['cart'=>$cart]);
                 return 1;         
        }
    }
        
       
       
    
}
 
    public function del(Request $request){
      $id = $request->input('id');
      $cart = session('cart');
      // dd($cart);
      foreach($cart as $k=>$v){

        if($v['id']==$id){

            unset($cart[$k]);
      }
     
    } 
    session(['cart'=>$cart]);

    if(empty(session('cart')) && empty(session('homename'))){
        return 0;
    }else if(!empty(session('homename') && !empty(session('cart')))){
        return 1;
    }else if(!empty(session('homename') && empty(session('cart')))){
        return 2;
    }else if(empty(session('homename') && !empty(session('cart')))){
        return 3;
    }
    

 }

    public function delcar(Request $request){
        $request->session()->pull('cart');


        if(empty(session('cart')) && empty(session('homename'))){
            return 0;
        }else if(!empty(session('homename') && !empty(session('cart')))){
            return 1;
        }else if(!empty(session('homename') && empty(session('cart')))){
            return 2;
        }else if(empty(session('homename') && !empty(session('cart')))){
            return 3;
        }
    }
}
