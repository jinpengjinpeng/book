<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;


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

