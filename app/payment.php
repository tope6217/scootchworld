<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    public function sub(){
        return $this->belongsTo('App\sub');
    }
}
