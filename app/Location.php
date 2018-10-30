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
    	return $this->hasMany(Avis::class, "loc_id","loc_id")->groupBy('per_id', 'avi_id')->distinct()->orderBy('avi_date', 'DESC');
    }

    public function toGerant()
    {
    	return $this->hasOne(Gerant::class, 'grt_id');
    }

    public function toLstEqui()
    {
        return $this->belongsToMany(Equipement::class, 't_j_equipementlocation_eql', 'loc_id', 'equ_id')->select('equ_libelle','eql_nombre');//
    }
    public function toTarifMin()
    {
        return $this->hasMany(TarifLocation::class, 'loc_id', 'loc_id')->select('tar_prix')->orderBy('tar_prix')->first();
    }
    
}
