<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    protected $table = 'garages';
    
    public function cars() {
        return $this->hasMany('App\Cars');
    }
}
