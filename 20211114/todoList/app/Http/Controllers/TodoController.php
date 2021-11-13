<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    //select all todo
    public function index()
    {
        $data = Todo::all();
        $param = [
            "todos"=>$data
        ];
        return view("index",$param);
    }

    //create todo
    public function create(TodoRequest $request)
    {
        $content = $request->content;
        Todo::create([
            "content"=>$content
        ]);
        return redirect("/");
    }

    //update todo
    public function update(TodoRequest $request)
    {
        $id = $request->id;
        $content = $request->content;
        Todo::where("id",$id)->update([
            "content"=>$content
        ]);
        return redirect("/");
    }

    //delete todo
    public function delete(Request $request)
    {
        $id = $request->id;
        Todo::where("id",$id)->delete();
        return redirect("/");
    }
}
