<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalMagang extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='jadwal_magang';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id','tanggal_mulai','tanggal_selesai','id_bagian_magang',
    ];

    protected $dates = [
        'tanggal_mulai','tanggal_selesai'
    ];
   
    public function bagian_magang()
    {
    return $this->belongsTo('App\BagianMagang', 'id_bagian_magang');
    }

    public function profil()
    {
     	return $this->belongsTo('App\Profil', 'id');
    }
    public function nilai()
   {
    return $this->hasOne('App\Nilai', 'id_nilai');
   }

}
