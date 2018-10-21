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
    public function index()
    {

     
        $cart = session('cart');
        $name = session('homename');

        if(empty($name)){
            return redirect('/homelogin');
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

        $info = DB::table('users')->where('username','=',$name)->first();

        $id = $info->id;

        $addr = DB::table('address')->where('uid','=',$id)->first();

       

        return view('Home.Order.index',['cate'=>HomeController::getCatesByPid(0),'data'=>$data,'total'=>$total,'addr'=>$addr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            
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
}
