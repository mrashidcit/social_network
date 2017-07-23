<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected  $fillable = [
        'user_id', 'post_id', 'like'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    pubilc function post(){
        return $this->belongsTo('App\Post');
}
}
