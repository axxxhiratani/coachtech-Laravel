<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function showBuilding()
    {
        return "建物です";
    }

    public function showRoom(Request $request)
    {
        return "部屋番号は".$request->room."です";
    }
}
