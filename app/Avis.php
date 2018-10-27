<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 't_e_avis_avi';
	public $primaryKey = 'avi_id';

    public function toAbonne()
    {
    	return $this->hasOne(Abonne::class, 'abo_id');
    }
    
}
