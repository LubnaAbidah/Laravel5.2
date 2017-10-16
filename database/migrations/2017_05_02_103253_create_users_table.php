<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('level', ['admin', 'user', 'superadmin']);
            $table->rememberToken();
            $table->timestamps();
        });
        //set FK
      Schema::table('tugas_magang', function (Blueprint $table) {
            $table->foreign('id_user')
            ->references('id')->on('users')
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
        //Drop FK
        Schema::table('tugas_magang', function(Blueprint $table) {
            $table->dropForeign('tugas_magang_id_user_foreign');
        });
        Schema::drop('users');
    }
}
