<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DragonController extends Controller
{
   

    public function store(Request $request){
        $input=$request->all();
        $input["color_Id"]=Color::where("color",$input["color_Id"])->first()->id;
        $validator=Validator::make($input,[
           
            "name"=>"required",
            "age"=>"required",
            "color_Id"=>"required"
    
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
    
        $dragon=Dragon::create($input);
    
        return $this->sendResponse(new DragonResources($dragon),"Siker");
    }
}
