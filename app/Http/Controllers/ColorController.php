<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\BaseController;
use App\Models\Color;
use App\Models\Dragon;

class ColorController extends Controller
{
    public function Color(Request $request){
        $colorReq=$request->color;
        $colorId=DB::table("colors")->where("color",$colorReq)->get();
        print_r($colorReq);
    }


    public function allRed(){
        $red=DB::table("colors")->where("color",'blue')->select("id")->first();
    }

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

    return $this->sendResponse(new DragonResources($dragon),"siker");



}
}
