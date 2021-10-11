<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateFirstUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $new = new User();
        $new->nama_user = "Admin";
        $new->username = "admin";
        $new->password = "e293cae6f650002d4ad88f3e0f7c6e63";
        $new->no_hp = "089697453244";
        $new->email = "admin@gmail.com";
        $new->role_user = 1;
        $new->user_status = 1;
        $new->rec_creator = 'APP';
        $new->rec_editor = 'APP';
        $new->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
