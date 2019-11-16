<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'project_id','user_id','title','description','type','status'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
