<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pembayaran')->nullable();
            $table->string('nama_pembayaran')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('user_id')->nullable(); // jika berelasi dengan tabel users
            $table->string('username')->nullable(); 
            $table->string('type', 1)->nullable();
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
        Schema::dropIfExists('pembayaran');
    }
}
