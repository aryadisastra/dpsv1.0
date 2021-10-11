<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePenyewaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->increments('id_penyewaan');
            $table->char('kode_penyewaan');
            $table->date('tanggal_penyewaan');
            $table->integer('jangka_waktu');
            $table->string('nama_customer');
            $table->string('email_customer');
            $table->string('alamat_customer');
            $table->string('nama_rek');
            $table->string('no_rek');
            $table->integer('id_mobil');
            $table->integer('total');
            $table->integer('status')->comment('1.Submitted, 2.Approved, 3.Used, 4.Finished, 5.Rejected, 6.Canceled');
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
        Schema::dropIfExists('penyewaan');
    }
}
