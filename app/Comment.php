<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id', 'user_id', 'comment', 'photo_id', 'status'
    ];

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

}
