<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $timestamps = false;

    public function Posts()
    {
        return $this->hasMany('App\Post');
    }

}
