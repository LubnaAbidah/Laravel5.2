<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJurusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_jurusan', 30);
            $table->timestamps();
        });
        Schema::table('profil', function(Blueprint $table){
            $table->foreign('id_jurusan')
                  ->references('id')
                  ->on('jurusan')
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
            $table->dropForeign('profil_id_jurusan_foreign');
        });
        Schema::drop('jurusan');
    }
}
