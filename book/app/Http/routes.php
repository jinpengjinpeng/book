<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

use App\Entity\Member;
//use Illuminate\Routing\Route;

//登录
Route::get('/',function(){
    return view('login');

});

Route::get('/login','View\MemberController@toLogin');

//注册
Route::get('/register','View\MemberController@toRegister');

//验证码

Route::any('validatecode/create','Service\ValidateCodeController@create');

//手机验证码
Route::any('validatecode/sendSMS','Service\ValidateCodeController@sendSMS');

//前台首页
//Route::get('/index','IndexController@index');


//后台首页
//Route::get('/admin','AdminController@index');

//用户添加
//Route::controller('/admin/user','UserController');
//Route::get('/admin/user/getAdd','AdminController@index');

