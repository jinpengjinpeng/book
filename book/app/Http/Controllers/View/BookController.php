<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Tool\ValidateCode\ValidateCode;
use App\Tool\SMS\SendTemplateSMS;
use App\Entity\TempPhone;
use App\Model\M3Result;
use App\Entity;
use Illuminate\Support\Facades\DB;

class BookController extends  Controller{
       //登录
        public  function index($value=''){
            $category  = DB::table('category')->where('parent_id','0')->get();
          // print_r($category);die;
          return view('category')->with('category',$category);
        }


}

