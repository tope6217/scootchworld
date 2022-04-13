<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersub extends Model
{
    public function sub(){
        return $this->belongsTo('App\sub');
    }
}
