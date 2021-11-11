<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;
use Illuminate\Support\Facades\Auth;


class AuthorController extends Controller
{
    //select author
    public function index(){
        $items = Author::Paginate(4);
        $user = Auth::user();
        $param = [
            "items" => $items,
            "user" => $user
        ];
        return view("index",$param);
    }

    //add author

    public function add(){
        return view("add");
    }

    // create author
    public function create(AuthorRequest $request){
        // $this->validate($request,Author::$rules);
        $form = $request->all();
        Author::create($form);
        return redirect("/");
    }

    // find author
    public function find(){
        return view("find", ["input"=>""]);
    }

    //search author
    public function search(Request $request){
        $item = Author::where("name","like","%{$request->input}%")->first();
        $param = [
            "input" => $request->input,
            "item" => $item
        ];
        return view("find",$param);
    }

    // bind author
    public function bind(Author $author){
        $date = [
            "item" => $author
        ];
        return view("author.binds",$date);
    }

    // edit author
    public function edit(Request $request){

        $author = Author::find($request->id);

        $date = [
            "form" => $author
        ];

        return view("edit",$date);
    }

    // update author
    public function update(Request $request){
        $this->validate($request,Author::$rules);
        $form = $request->all();
        unset($form["_token"]);
        Author::where("id",$request->id)->update($form);
        return redirect("/");
    }

    // delete author
    public function delete(Request $request){
        $author = Author::find($request->id);
        $date = [
            "form" => $author
        ];
        return view("delete",$date);
    }

    // remove author
    public function remove(Request $request){
        Author::where("id",$request->id)->delete();
        return redirect("/");
    }

    //relate author
    public function relate(Request $request){
        $hasItems = Author::has("book")->get();
        $noItems = Author::doesntHave("book")->get();
        $date = [
            "hasItems" => $hasItems,
            "noItems"=> $noItems
        ];

        return view("author.index",$date);
    }

    //check user
    public function check(Request $request)
    {
        $param = [
            "text" => "ログインしてください"
        ];

        return view("auth",$param);
    }

    //ログイン処理の確認 :get auth
    public function checkUser(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        //ログイン処理の実装 :post auth
        if(Auth::attempt([
                "email" => $email,
                "password" => $password
                ]
            )){
            $user = Auth::user();
            $text = Auth::user()->name."ログインに成功しました。";
            }else{
                $text = "ログインに失敗しました。";
            }

        // return view("auth",["text" => $text,"user" => $user]);
        return redirect("home");
    }


}

