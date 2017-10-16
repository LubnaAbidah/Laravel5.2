<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInstansi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instansi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_instansi',40)->unique();
            $table->string('alamat',100);
            $table->string('no_telp',20);
            $table->timestamps();
        });
        Schema::table('profil', function (Blueprint $table) {
            $table->foreign('id_instansi')
            ->references('id')->on('instansi')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profil', function(Blueprint $table){
            $table->dropForeign('profil_id_instansi_foreign');
        });
        Schema::drop('instansi');
    }
}
