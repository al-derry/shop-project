<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Mail\VerifyEmail;
// use App\Models\User;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
//use Tymon\JWTAuth\Facades\JWTAuth;
class AuthApiController extends Controller
{

    public function login(Request $req) {
            
            // $body = $req->getContent();
            // $request = json_decode($body);
            return  response()->json($req->input('email'));
            $validator = Validator::make($req->all(),[
                "email" => "required|string|email|max:100",
                "password" => "required|string|min:6"

            ]);

            if ($validator->fails()) {
                    return response()->json([ 'error' => $validator->errors()], 400);
            }            
            $token = Auth::guard('user-api')->claims(['guard' => 'user'])->attempt(['email' => $req->email, 'password' => $req->password]);
            
            if (!$token)
                return response()->json([ 'error' => ['errorData' =>  ['Incorrect email or password.']]], 404);

            $user = Auth::guard('user-api')->user();
            return response()->json([
            'user_id' => $user->id,
            'token' => $token,
            'state' => $user->state
        ], 200);

    }


    // public function logout() {

    //     Auth::guard('user-api')->logout();

    //     return $this->returnSuccessMessage('Logged out successfully');
    // }

}
