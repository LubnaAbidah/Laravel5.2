<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='profil';

    protected $fillable = [
        'no_identitas','nama','tanggal_lahir','jenis_kelamin','id_instansi','id_jurusan','status',
    ];

    protected $dates = [
        'tanggal_lahir'
    ];

    public function instansi()
   {
   	return $this->belongsTo('App\Institusi', 'id_instansi');
   }

    public function jurusan()
   {
    return $this->belongsTo('App\Jurusan', 'id_jurusan');
   }

    public function jadwalmagang()
   {
    return $this->hasOne('App\JadwalMagang', 'id');
   }



}
