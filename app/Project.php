<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name','description','start','end','latitude','longitude','photo_id'
    ];

    public function posts() 
    {
        return $this->hasMany('App\Post');
    }
}
