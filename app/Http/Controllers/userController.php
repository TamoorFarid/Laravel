<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function signup(Request $request){
        $validation = Validator::make($request->all(),[
            "email" => "required|email|max:255",
            "password" =>"required"
        ]);
        if($validation->fails()){
            return response()->json($validation->errors(),422);
        }else{
            $user = User::create([
                "email"=>$request->email,
                "password"=>$request->password,
            ]);
            $token = $user->createToken('auth_token')->accessToken;

            return response()->json([
               "token"=>$token,
               "user"=>$user,
               "Message"=>"User has been signed up successfully",
            ]);
        }
    }
     public function login(Request $request){
        $validation = Validator::make($request->all(),[
            "email"=>"required | max:255 |email",
            "password" => "required"
        ]);
        if($validation->fails()){
            return response()->json($validation->errors(),422);
        }
            $user = User::where([["email",$request->email]])->first();
            if($user){
                $token = $user->createToken('auth_token')->accessToken;
                return response()->json([
                    "token"=>$token,
                     "user" => $user,
                     "message"=>"user has been logged in successfully"
                 ]);
            }
     }
     
     public function getUser($id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json([
                "user"=> "null",
                "message"=>"User not found",
                "status" => 0
            ]);
        }
        return response()->json([
            "user"=> $user,
            "message"=>"User found successfully",
            "status" => 1
        ]);
    }

    public function logout(Request $request){
        $user = $request -> user();
        if($user){
            $user->token()->revoke();
            return response()->json([
                "message"=>"User logged out successfully"
            ]);
        }
        return response()->json(['message' => 'User not found'], 404);
    }
}
