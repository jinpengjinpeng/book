<?php
namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Model\M3Result;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AddCartController extends  Controller{
       //添加购物车
        public  function addCart(Request $request){
            $m3_result = new M3Result;
            $m3_result->status = 0;
            $m3_result->message = '添加成功';

            $pro_id = $request->input('pro_id','');
            $bk_cart = $request->cookie('bk_cart');
           // print_r($bk_cart);die;

            $bk_cart_arr = $bk_cart?explode(',',$bk_cart):array();

            $count = 1;
            foreach($bk_cart_arr as $key=>&$value){//传引用
                $index = strpos($value,':');
                if(substr($value,0,$index)==$pro_id){
                     $count = (int)substr($value,$index+1)+1;
                     $value = $pro_id.':'.$count;
                     break;
                }

            }
        if($count ==1){
            array_push($bk_cart_arr,$pro_id.":".$count);
        }

          //  print_r($bk_cart_arr);die;

            return response($m3_result->toJson())->withCookie('bk_cart', implode(',', $bk_cart_arr));
        }

    public function delcart(Request $request){
        $pro_ids_arr = $request->input('pro_ids_arr','');
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '删除成功';
        if($pro_ids_arr == '') {
            $m3_result->status = 1;
            $m3_result->message = '书籍ID为空';
            return $m3_result->toJson();
        }
        $product_ids = explode(',', $pro_ids_arr);
    //    print_r($product_ids);
        // 未登录
        $bk_cart = $request->cookie('bk_cart');
        $bk_cart_arr = ($bk_cart!=null ? explode(',', $bk_cart) : array());
    //    print_r($bk_cart_arr);
        foreach($bk_cart_arr as $key=>$value){
            $index = strpos($value,':');
            $por_id = substr($value,0,$index);
            if(in_array($por_id,$product_ids)){
               unset($bk_cart_arr[$key]);
            }

        }

    //    print_r($bk_cart_arr);

        return response($m3_result->toJson())->withCookie('bk_cart', implode(',', $bk_cart_arr));

    }

}

