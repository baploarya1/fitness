<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id secara otomatis
            $table->string('nomor_transaksi')->nullable();
            $table->date('tanggal_transaksi')->nullable();
            $table->integer('id_paket')->nullable();
            $table->integer('id_member')->nullable();
            $table->date('tanggal_mulai_berlaku')->nullable();
            $table->date('tanggal_habis_berlaku')->nullable();
            $table->decimal('harga_paket', 16, 2)->nullable();
            $table->integer('id_pembayaran')->nullable();
            $table->string('status')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('no_kartu')->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}
