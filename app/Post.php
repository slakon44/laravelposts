<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body',
    ];
    //224
    protected function user(){
        return $this->belongsTo('App\User'); //224
    }
    protected function photo(){ //224
        return $this->belongsTo('App\Photo'); //224
    }
    protected function category(){
        return $this->belongsTo('App\Category'); //224
    }

    }
