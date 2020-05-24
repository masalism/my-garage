<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{

    public function cars() {
        return $this->hasMany('App\Car');
    }
}
