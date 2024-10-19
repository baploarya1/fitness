<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_aksesoris')->nullable();
            $table->string('nomor_transaksi')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('jenis')->nullable();
            $table->bigInteger('harga')->nullable();  
            $table->integer('qty_satuan_kecil')->nullable();
            $table->date('tanggal_transaksi')->nullable();
            $table->string('satuan')->nullable();
            $table->integer('masuk')->nullable(); 
            $table->integer('keluar')->nullable(); 
            $table->integer('user_id')->nullable();  
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
        Schema::dropIfExists('mutasi');
    }
}
