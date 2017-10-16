<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'instansi';

    protected $fillable = [
		'nama_instansi','alamat','no_telp',
    ];

   public function profil()
    {
    	return $this->hasMany('App\Profil', 'id_instansi');
    }
}
