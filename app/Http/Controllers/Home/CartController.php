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
          // var_dump($data);exit;
          $num = $v['num'];
          //利用id查出商品
          $info  =  DB::table('pro_goods')->where('id','=',$v['id'])->first();

          //组装成数组
          $row['name'] = $info->name;
          $row['pic'] = $info->pic;
          // var_dump($v['num']);exit;
          $row['num'] = $num;
          $row['price'] = $info->price;
          $row['id'] = $v['id'];
          $total+=$row['price']*$row['num'];
          // var_dump($row);exit;
          $datas[] = $row;
          // var_dump($datas);exit;
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
        // dd($req);
          $data =$request->except('_token');

          if(!$this->Carts($data['id'])){
            
            $request->session()->push('cart',$data);
          }else{

              $cart = session('cart');
              $num = $data['num'];
              foreach($cart as $k=>$v){
                if($data['id']==$v['id']){
                $cart[$k]['num'] += $num;
                } 
               
              }
             
              session(['cart'=>$cart]);

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
        $id = $request->id;
        $info= DB::table('pro_goods')->where('id','=',$id)->first();
        $str = $info->stock;

        $cart = session('cart');

        foreach($cart as $k=>$v){

            if($v['id']==$id){

               
                if(($v['num']+1)>$str){
                   
                    return 0;
                }else{

                 $cart[$k]['num']+=1;
                 session(['cart'=>$cart]);
                    return 1;
                }

        }

       
       
    }
}

    public function jian(Request $request){
        $id = $request->id;
        $cart = session('cart');

        foreach($cart as $k=>$v){

            if($v['id']==$id){

               
                if(($v['num']-1)<=0){
                   
                    return 0;
                }else{

                 $cart[$k]['num']=$v['num']-1;
                 session(['cart'=>$cart]);
                return 1;
                }

        }

       
       
    }
}
    public function del($id){

      $cart = session('cart');

      foreach($cart as $k=>$v){

        if($v['id']==$id){

            unset($cart[$k]);
      }
      session(['cart'=>$cart]);
      return redirect('/Cart');

    }
 }

    public function publ(){
        
    }
}
