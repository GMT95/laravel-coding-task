<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];

    public function readers()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
