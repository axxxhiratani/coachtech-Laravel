<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "age",
        "nationality"
    ];

    // public static $rules = array(
    //     "name" => "required",
    //     "age" => "integer|min:0|max:150",
    //     "nationality"=>"required"
    // );

    public  function getDetail(){

        $txt = 'ID:'.$this->id . ' ' . $this->name . '(' . $this->age .  '才'.') '.$this->nationality;
        return $txt;
    }

    //author->book
    public function book(){
        return $this->hasOne(Book::class);
    }

    //author->books
    public function books(){
        return $this->hasMany(Book::class);
    }

}
