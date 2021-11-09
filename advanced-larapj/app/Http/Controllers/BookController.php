<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //index book
    public function index(Request $request){
        $items = Book::with("author")->get();
        $data = [
            "items" => $items
        ];
        return view("book.index",$data);
    }

    // add book
    public function add(Request $request){
        return view("book.add");
    }

    //create book
    public function create(Request $request){
        $this->validate($request,Book::$rules);
        $form = $request->all();
        Book::create($form);
        return redirect("/book");
    }

}
