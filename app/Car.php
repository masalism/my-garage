<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    public $primaryKey = 'id';
    public $timestamps = true;
}
