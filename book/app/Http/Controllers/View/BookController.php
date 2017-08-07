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

class BookController extends  Controller{
       //登录
        public  function index($value=''){
            $category  = DB::table('category')->where('parent_id','0')->get();
          // print_r($category);die;
          return view('category')->with('category',$category);
        }

       public  function  toProduct(Request $request){
               $pro = $request->all();
       //    print_r($pro);die;
               $product = DB::table('product')->where('category_id',$pro['category_id'])->get();

         //  print_r($product);die;
          // log::error('efsdf');
           return view('product')->with('product',$product);
           }
       public  function  toPdtcontent(Request $request){
            $pro = $request->all();
            //    print_r($pro);die;
            $product = DB::table('product')->where('id',$pro['pro_id'])->first();
            $pdtInfo = DB::table('pdt_connent')->where('product_id',$pro['pro_id'])->first();
            $pdt_images = DB::table('pdt_images')->where('product_id',$pro['pro_id'])->get();
           //   print_r($product);die;
          //  print_r($pdtInfo);die;
            // log::error('efsdf');
            return view('pdt_content')->with('product',$product)
                                        ->with('pdtinfo',$pdtInfo)
                                        ->with('pdt_images', $pdt_images);
       }

}
