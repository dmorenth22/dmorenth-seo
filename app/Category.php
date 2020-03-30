<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name' ,'slug'];
    protected $table = 'category';
 
    public function post(){
        return $this->hasMany('App\Post');

    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
