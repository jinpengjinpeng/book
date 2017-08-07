<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Tool\ValidateCode\ValidateCode;
use App\Tool\SMS\SendTemplateSMS;
use App\Entity\TempPhone;
use App\Model\M3Result;

class MemberController extends  Controller{
       //登录
        public  function toLogin($value=''){
          return view('login');
        }
       //注册
        public  function toRegister($value=''){
              return view('register');

        }


}

