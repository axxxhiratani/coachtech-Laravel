<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    //select author
    public function index(){
        $items = Author::Paginate(4);
        return view("index",["items" => $items]);
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

}

