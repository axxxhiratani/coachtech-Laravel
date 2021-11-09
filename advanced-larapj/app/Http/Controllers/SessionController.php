<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //②キーを指定して値を取得する
    public function getSes(Request $request)
    {
        $ses = [
            "data"=>$request->session()->get("txt")
        ];
        return view("/session",$ses);
    }

    // ①値にキーという名前をつけて保存する
    public function postSes(Request $request)
    {
        $txt = $request->input;
        $request->session()->put("txt",$txt);
        return redirect("/session");
    }
}
