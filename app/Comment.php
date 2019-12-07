<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Post;

class Comment extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
