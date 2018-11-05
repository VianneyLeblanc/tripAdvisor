<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonne extends Model
{
    protected $table = 't_e_abonne_abo';
    public $timestamps = false;
    public $primaryKey = 'abo_id';

    public function getAuthPassword() { 
    	return $this->abo_motpasse;
    }
}
