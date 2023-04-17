<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result,$message){
        $response=[
            "succes"=>true,
            "data"=>$result,
            "message"=>$message
        ];
        return response()->json($response,300);
    }

    public function sendErorr($erorr,$erorrMessage=[],$code=404){
        $response=[
            "succes"=>false,
            "message"=>$erorr
        
        ];
        if (!empty($erorrMessage)){
            $response [$data]=$erorrMessage;

        }
        return response()->json($response,$code);
    }



}
