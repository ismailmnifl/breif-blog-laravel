<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    function comments(){
    	return $this->hasMany('App\Models\Comment');
    }

    function user(){
    	return $this->belongsTo('App\Models\User');
    }
    
}
