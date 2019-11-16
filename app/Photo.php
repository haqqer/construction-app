<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'path', 'url'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
