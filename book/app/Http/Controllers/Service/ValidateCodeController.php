<?php

namespace App\Http\Controllers\Service;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use App\Tool\ValidateCode\ValidateCode;

class ValidateCodeController extends Controller
{

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create($value='')
    {
           // ob_clean();
            $Validate = new ValidateCode();
            return $Validate->doImg();
    }
}
