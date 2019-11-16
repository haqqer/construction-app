<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name','description','start','end','status','latitude','longitude','photo_id'
    ];


    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function posts() 
    {
        return $this->hasMany('App\Post');
    }
}
