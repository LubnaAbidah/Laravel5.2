<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table ='nilai';

    protected $primaryKey = 'id_nilai';

    protected $fillable = [
        'id_nilai','nilai_absen','nilai_tugas','nilai_kejujuran',
    ];


    public function jadwalmagang()
   {
   	return $this->belongsTo('App\JadwalMagang', 'id_nilai');
   }

}
