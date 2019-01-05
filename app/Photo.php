<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $uploads = '/images/'; //209

    //205
    protected $fillable =['file']; // i ide do app/user.php

    public function getFileAttribute($photo){ //209
        return $this->uploads.$photo;
    }
}
