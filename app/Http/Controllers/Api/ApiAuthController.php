<?php

namespace App\Http\Controllers\Api;

use App\Helpers\JwtToken;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class ApiAuthController extends ApiController
{
    
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;


        $secretApiKey = $request->header('authorization');

        $token = JwtToken::setData([
            'email'=> $email,
            'id'=> 1,
            'role_id' => 1
        ])
        ->build();

        return $this->sendSuccess($token);
    }

    public function logout(Request $request){
        JwtToken::blacklist();
        return $this->sendSuccess('Ok');
    }
}
