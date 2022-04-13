<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    public function sections()
    {
        return $this->belongsTo('App\section', 'section_id', 'id')->with('category');
    }
}
