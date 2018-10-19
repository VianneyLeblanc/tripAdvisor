<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 't_e_location_loc';
    public $timestamps = false;
    public $primaryKey = 'loc_id';
    
}
