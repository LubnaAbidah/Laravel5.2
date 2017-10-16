<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBagianMagang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bagian_magang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_bagian', 20);
            $table->timestamps();
        });
        Schema::table('jadwal_magang', function(Blueprint $table){
            $table->foreign('id_bagian_magang')
                  ->references('id')
                  ->on('bagian_magang')
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
            $table->dropForeign('jadwal_magang_id_bagian_magang_foreign');
        });
        
        Schema::drop('bagian_magang');
    }
}
