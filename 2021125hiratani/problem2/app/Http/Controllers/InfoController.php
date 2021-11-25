<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Info;
use App\Http\Requests\InfoRequest;

class InfoController extends Controller
{
    //

    public function store(InfoRequest $request)
    {
        $data=[
            "name" => $request->name,
            "email" => $request->email,
        ];
        $item = [
            "message" => "お問い合わせありがとうございます。",
        ];
        Info::create($data);
        return view("thanks",$item);
    }
}
