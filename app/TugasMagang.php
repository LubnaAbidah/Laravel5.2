<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasMagang extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='tugas_magang';

    protected $fillable = [
        'id_user','tugas','deskripsi','tanggal_tugas','status',
    ];

   protected $dates = [
        'tanggal_tugas'
        ];

   public function user()
   {
   	return $this->belongsTo('App\User', 'id_user');
   }
   
}
