<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengobatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengobatan', function (Blueprint $table) {
            $table->id();
            $table->integer('pendaftaran_id')->unsigned();
            $table->integer('pasien_id')->unsigned();
            $table->bigInteger('total_biaya_pengobatan')->nullable();
            $table->string('status_pembayaran')->nullable();
            $table->date('tanggal_pembayaran')->nullable();
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
        Schema::dropIfExists('pengobatans');
    }
}
