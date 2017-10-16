<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->increments('id_nilai')->unsigned();
            $table->integer('nilai_absen');
            $table->integer('nilai_tugas');
            $table->integer('nilai_kejujuran');
            $table->timestamps();
                $table->foreign('id_nilai')
                ->references('id')->on('jadwal_magang')
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
        Schema::drop('nilai');
    }
}
