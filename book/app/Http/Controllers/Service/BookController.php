<?php
namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Tool\ValidateCode\ValidateCode;
use App\Tool\SMS\SendTemplateSMS;
use App\Entity\TempPhone;
use App\Model\M3Result;
use App\Entity;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends  Controller{
       //登录
        public  function getbookJson(Request $request){
         $category_id = $request->all('category_id');
               // $category_id = $category_id['category_id'];
         $sonInfo = DB::table('category')->where('parent_id','=',$category_id['category_id'])->get();

         echo json_encode(json_decode(json_encode($sonInfo)));

        }

}

