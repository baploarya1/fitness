<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->string('faktur')->nullable();
            $table->string('kode_barang')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('satuan')->nullable();
            $table->decimal('qty_satuan_besar')->nullable();
            $table->integer('qty_satuan_kecil')->nullable();
            $table->bigInteger('harga')->nullable();  
            $table->bigInteger('sub_total')->nullable();  
            $table->date('tanggal_pembelian')->nullable();
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
        Schema::dropIfExists('table_pembelian');
    }
}
