<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function sections()
    {
        return $this->hasMany('App\section');
    }
}
