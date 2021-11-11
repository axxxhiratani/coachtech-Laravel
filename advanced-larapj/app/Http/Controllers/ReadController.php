<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Read;
use Illuminate\Support\Str;

class ReadController extends Controller
{
    //
    public function fillRead()
    {
        $read = new Read();
        $uuid = (string)Str::uuid();
        $read->fill([
            "uuid" => $uuid,
            "name" => "FillBook",
            "price" => 1500
        ]);
        $read->save();
    }

    public function createRead()
    {
        $uuid = (string)Str::uuid();
        $Read::create([
            "uuid" => $uuid,
            "name" => "CrateBook",
            "price" => 1200
        ]);

    }

    public function insertRead()
    {
        $read = new Read();
        $uuid = (string)Str::uuid();
        $read::insert([
            "uuid" => $uuid,
            "name" => "InsertBook",
            "price" => 1800
        ]);
    }
}
