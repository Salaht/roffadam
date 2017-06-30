<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   
	public function User()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function Comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function Artist()
    {
        return $this->belongsTo('App\Artist', 'artist_id');
    }

}
