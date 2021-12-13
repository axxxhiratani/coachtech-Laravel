<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class InvestigateController extends Controller
{
    //
    public function searchIdByUid(Request $request)
    {
        $item = User::where("uuid",$request->uuid)->get();
        if($item){
            return response()->json([
                "user"=>$item,
            ],200);
        }else{
            return response()->json([
                "message"=>"Not Found"
            ],404);
        }
    }

}
