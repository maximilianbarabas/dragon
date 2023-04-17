<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController

{

    public function signUp(Request $request){
        $validator=Validator::make($request->all(),[
            "name"=>"required",
            "email"=>"required",
            "password"=>"required",
            "confirm password"=>"required|same:password"


    ]);
    if ($validator->fails())    {
        print_r("Hiba!! A belépés sikertelen");


    }
    $input = $request->all();
    $input["password"]=bcrypt($input["password"]);
    $user=User::create($input);
    $succes["name"]=$user->name;


    return $this->sendResponse($success, "sikeres regisztráció");

    }
    public function signIn(Request $request){
        if(Auth::attempt(["email"=>$request->email,"password"=>$request->password])){

            $authUser=Auth::user();
            $success["token"]=$authUser->createToken("MyAuthApp")->plainTextToken;
            $success["name"]=$authUser->name;
            return $this->sendResponse($success ,"sikeres belépés");

        }else{

            return print_r("sikertelen belépés");
        }
    }

    public function logout(Request $request){

        auth("sanctum")->user()->currentAccessToken()->delete();
        return print_r("sikeres kijelentkezés");
        
    }
}
