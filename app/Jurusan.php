<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'jurusan';

    protected $fillable = [
		'nama_jurusan',
    ];

    public function profil()
    {
    	return $this->hasMany('App\Profil', 'id_jurusan');
    }

}
