<?php
namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Tool\UUID;
use App\Tool\ValidateCode\ValidateCode;
use App\Tool\SMS\SendTemplateSMS;
use App\Entity\TempPhone;
use App\Entity\Member;
use App\Model\M3Result;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\M3Email;
use Mail;
use redirect;


class MemberController extends  Controller{
       //注册
        public  function Register(Request $request){

             $data = $request->all();

            //print_r($data);
            $phone = $data['phone'];
            $code = $request->session()->get('validateCode');
            $password = $data['password'];
            $confirm = $data['confirm'];
        //    $validate_code = $data['validate_code'];
            $phone_code = $data['phone_code'];
       //     $uuid = UUID::create_uuid();

            $tempPhone = DB::table('temp_phone')->where('phone','=',$phone)->orderBy('created_at','desc')->limit(1)->first();
        //    print_r($tempPhone);
       //     print_r(json_decode( json_encode($tempPhone),true));die;
            $M = new M3Result();
            if(strlen($phone) !=11){
                $M->status='300';
                $M->message='手机格式不正确';
                return $M->toJson();
            }
            if(strlen($password)<6){
                $M->status='300';
                $M->message='密码长度不正确';
                return $M->toJson();
            }

            if($tempPhone->phone != $phone_code){
                $M->status='300';
                $M->message='手机验证码不正确';
            //    return $M->toJson();
            }
//
//            if($tempPhone->validate_code != $_SESSION['validate_code']){
//                $M->status='300';
//                $M->message='验证码不正确';
//              //  return $M->toJson();
//            }
            $data = array(
                'phone'=>$phone,
                'password'=>$password,
            );
            $res = DB::table('member')->insert($data);
            if($res){
               $M->status=0;
                $M->message='成功';
                return $M->toJson();
            }else{
                $M->status='300';
                $M->message='注册失败';
                return $M->toJson();
            }

        }
    /*
     * 登录
     * */
    public  function login(Request $request){
        //获取
          $name = $request->get('name','');
          $password = $request->get('password','');
          $code = $request-get('code','');
          $email = $request->get(email,'');
          $phone = $request->get(phone,'');
        //校验
        $M = new M3Result();
        if($code != $request->session()->get('validata_code')){
            $M->status='300';
            $M->message='验证码不正确';
            return $M->toJson();
        }

        //判断
        $res = null;
        if(strpos($name,'@')){
          $res = DB::table('member')->where('email','=',$email)->first();

        }else{
            $res = DB::table('member')->where('phone','=',$phone)->first();
        }
       if(!$res){
           $M->status='300';
           $M->message='用户不存在';
           return $M->toJson();
       }else{
           if(md5($password) != $res->password){
               $M->status='300';
               $M->message='用户不存在';
               return $M->toJson();
           }

       }

        $request->session()->put('user',$res);

        $M->status='200';
        $M->message='登录成功';
        return $M->toJson();


    }



    /**
     * 发封电子邮件提醒给用户。
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function sendEmailReminder(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Mail::send('email_register', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }



}

