<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class demoController extends Controller
{
    public function show(){
        $user = User::all();
        return $user;
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),
            [
                "firstName" =>"required | string | max:255",
                "lastName" =>"required",
                "email" =>"required | email",
                "password" =>"required",
            ]
            );
            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }

                $user = new User();
                $user -> name = $request -> firstName;
                $user -> lastName = $request -> lastName;
                $user -> email = $request -> email;
                $user -> password = $request -> password;
                $user -> save();
            return response()->json($user,201);
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            "firstName"=>"required",
            "lastName"=>"required",
            "email"=>"required | email|max:255|string"
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        else{
            $user = User::find($id);
            $user->name = $request -> firstName;
            $user->lastName = $request -> lastName;
            $user->email = $request -> email;
            $user->save();

            return response()->json($user,201);
        }
    }

    public function delete($id){
        $user =  User::find($id)->delete();
        if($user){
            return response()->json(['message'=>'The user has been deleted successfully'],200);
        }
    }
}
