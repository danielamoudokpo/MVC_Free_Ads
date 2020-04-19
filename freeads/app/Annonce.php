<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    public function la(){

        return $this->belongsTo('App\User');
    }

    public function lo(){

        return $this->hasMany('App\Message');
    }
}
