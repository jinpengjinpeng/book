<?php

namespace App\Http\Controllers\Service;

use App\User;
use Illuminate\Support\Facades\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Tool\ValidateCode\ValidateCode;
use App\Tool\SMS\SendTemplateSMS;
use App\Entity\TempPhone;
use App\Model\M3Result;


class ValidateCodeController extends Controller
{
    private $codeLen = 4;
    private $charset = '1234567890';
    private $code;
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create($value='')
    {
           // ob_clean();
            $V = new ValidateCode();
            $_SESSION['ValidateCode']=$V->getCode();
            echo $V->doImg();
    }

    public function sendSMS(Request $request)
    {
       $M = new M3Result();
       $phone = $request::input('phone','');
        if($phone==''){
            $M->status = 1;
            $M->message = '手机号不能为空';
            return $M->toJson();
        }

        $SMS = new SendTemplateSMS();
        //生成随机码
        $_len = strlen($this->charset) - 1;
        for ($i = 0; $i < $this->codeLen; $i++) {
            $this->code .= $this->charset[mt_rand(0, $_len)];
        }

        $M3Result = $SMS->sendTemplateSMS($phone,array($this->code,'60'),"1");
        $M3Result = json_decode($M3Result,true);
      //  print_r($M3Result);die;//{"status":0,"message":"成功"}
        if($M3Result['status'] == 0){
            $T = new TempPhone();
            $T->phone = $phone;
            $T->code = $this->code;
            $T->deadline = date('Y-m-d H:i:s',time()+60*60);
            $T->save();
            $M->status = 0;
            $M->message = '发送成功';
            return $M->toJson();
        }else{
            $M->status = 1;
            $M->message = '发送失败';
            return $M->toJson();
        }


     //   print_r($this->code);
    }
}
