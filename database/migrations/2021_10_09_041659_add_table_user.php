<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('nama_user');
            $table->string('username');
            $table->string('password');
            $table->char('no_hp');
            $table->string('email');
            $table->integer('role_user')->comment('1. Admin, 2. Operator');
            $table->integer('user_status');
            $table->string('rec_creator');
            $table->string('rec_editor');
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
        Schema::dropIfExists('user');
    }
}
