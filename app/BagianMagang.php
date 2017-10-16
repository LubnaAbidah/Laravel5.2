<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BagianMagang extends Model
{
     protected $table = 'bagian_magang';

    protected $fillable = [
	'nama_bagian',
    ];
   public function jadwalmagang()
    {
    	return $this->hasMany('App\JadwalMagang', 'id_bagian_magang');
    }
}
