<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipementLocation extends Model
{
    protected $table = 't_j_equipementlocation_eql';
    public $primaryKey = ['loc_id', 'equ_id'];
}
