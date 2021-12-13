<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item = Post::all();
        $length = count($item);
        for($i = 0; $i < $length; $i++){
            $user_id = $item[$i]["user_id"];
            $user = User::where("id",$user_id)->get();
            $item[$i]["user_id"] = $user;
        }
        return response()->json([
            "posts"=>$item
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $item = Post::create($request->all());
        return response()->json([
            "post" => $item
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $item = Post::where("id",$post->id)->with("comments")->get();
        $user_id = $item[0]["user_id"];
        $user = User::where("id",$user_id)->get();
        $item[0]["user_id"] = $user[0]["name"];
        $users = User::all();
        $users_len = count($users);

        $item_len = count($item[0]["comments"]);
        for($i = 0; $i < $item_len; $i++){
            $user_id = $item[0]["comments"][$i]["user_id"];
            $user_name = "";
            for($j = 0; $j < $users_len; $j++){
                if($users[$j]["id"] == $user_id){
                    $user_name = $users[$j]["name"];
                }
            }
            $item[0]["comments"][$i]["user_id"] = $user_name;
        }
        if($item){
            return response()->json([
                "post" => $item,
                "len" => $item_len,
                "users" => $users,
                "lenuser" => $users_len,
            ],200);
       }else{
            return response()->json([
                "message" => "Not Found"
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $item = Post::where("id",$post->id)->delete();
        if($item){
            return response()->json([
                "message" => "Delete post"
            ],200);
        }else{
            return response()->json([
                "message" => "Not Found"
            ],404);
        }
    }
}
