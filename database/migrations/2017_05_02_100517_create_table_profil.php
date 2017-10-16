<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_identitas', 20)->unique();
            $table->string('nama', 30);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L','P']);
            $table->enum('status', ['U','M','S']);
            $table->integer('id_instansi')->unsigned();
            $table->integer('id_jurusan')->unsigned();
            $table->timestamps();
        });
         Schema::table('jadwal_magang', function(Blueprint $table){
            $table->foreign('id')
                  ->references('id')
                  ->on('profil')
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
        Schema::table('jadwal_magang', function(Blueprint $table){
            $table->dropForeign('jadwal_magang_id_foreign');
        });
        Schema::drop('profil');
    }
}

