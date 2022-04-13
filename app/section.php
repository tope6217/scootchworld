<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    public function news(){
        return $this->hasMany('App\news');
    }

    public function ne(){
        return $this->hasOne('App\news')->orderBy('id','DESC');
    }

    public function category(){
        return $this->belongsTo('App\category');
    }
}
