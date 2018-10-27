<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gerant extends Model
{
    protected $table = 't_e_gerant_grt';
    public $primaryKey = 'grt_id';

    public function toLng()
    {
    	return $this->belogsTo(Langue::class, 'grt_id');
    }
}
