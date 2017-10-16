<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTugasMagang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas_magang', function (Blueprint $table) {
            $table->increments('id');
           $table->integer('id_user')->unsigned();
            $table->string('tugas', 20);
            $table->string('deskripsi', 200);
            $table->date('tanggal_tugas');
            $table->enum('status', ['B','S']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tugas_magang');
    }
}
