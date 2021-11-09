<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Book extends Model
{
    // use HasFactory;
    protected $guarded = array('id');
    public static $rules = array(
        'author_id' => 'required',
        'title' => 'required',

    );

    public function getTitle(){
        return "id".$this->id.";".$this->title."著者".optional($this->author)->name;
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }

}
