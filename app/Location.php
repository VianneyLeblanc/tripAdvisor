<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 't_e_location_loc';
    public $timestamps = false;
    public $primaryKey = 'loc_id';

    public function avis()
    {
    	return $this->hasMany(Avis::class, "loc_id","loc_id");
    }

    public function toGerant()
    {
    	return $this->hasOne(Gerant::class, 'grt_id');
    }

    public function toLstEqui()
    {
        return $this->belongsToMany(Equipement::class, 't_j_equipement_location_eql','loc_id', 'equ_id');
    }
    
}
