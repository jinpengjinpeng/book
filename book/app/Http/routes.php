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

Route::any('service/register','Service\MemberController@register');

Route::any('view/categroy','View\BookController@index');

Route::any('service/categroy','Service\BookController@getbookJson');

//产品
Route::get('view/product','View\BookController@toProduct');

//产品详情
Route::get('view/pdtcontent','View\BookController@toPdtcontent');

//添加购物车
Route::any('service/addcart','Service\AddCartController@addCart');
//删除商品
Route::any('service/delcart','Service\AddCartController@delcart');

Route::any('view/cart','View\CartController@toCart');
//前台首页
//Route::get('/index','IndexController@index');


//后台首页
//Route::get('/admin','AdminController@index');

//用户添加
//Route::controller('/admin/user','UserController');
//Route::get('/admin/user/getAdd','AdminController@index');

