<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    // Table Name
    protected $table = 'cars';
    //Primary Key
    public $primaryKey = 'id';

    public $timestamps = true;

    public function garage() {
        return $this->belongsTo('App\Garage');
    }
}
