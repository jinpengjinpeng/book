<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Tool\ValidateCode\ValidateCode;
use App\Tool\SMS\SendTemplateSMS;
use App\Entity\TempPhone;
use App\Model\M3Result;
use App\Entity;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Log;

class CartController extends  Controller{


    public  function  toCart(Request $request){

        $cart_items = array();
        $bk_cart = $request->cookie('bk_cart');
        $bk_cart_arr = $bk_cart?explode(',',$bk_cart):array();
       // print_r($bk_cart_arr);
        foreach($bk_cart_arr as $key=>$value){
            $index = strpos($value,':');
           // $cart_item['id'] = $key;
            $cart_item['product'] =(array) DB::table('product')->where('id',substr($value,0,$index))->first();
            $cart_item['product']['product_id'] = substr($value,0,$index);
            $cart_item['product']['count'] = substr($value,$index+1);
            if($cart_item['product'] != null) {
                array_push($cart_items, $cart_item['product']);
            }
        }


//print_r($cart_items);die;
        return view('cart')->with('cart_items',$cart_items);
    }

}
