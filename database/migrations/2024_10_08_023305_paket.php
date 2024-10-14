<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Paket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->id(); // Kolom ID default
            $table->string('kode_paket'); // Kode Paket
            $table->string('nama_paket')->nullable(); // Nama Paket
            $table->string('kategori')->nullable(); // Kategori
            $table->date('tanggal_mulai_berlaku')->nullable(); // Tanggal Mulai Berlaku
            $table->date('tanggal_habis_berlaku')->nullable(); // Tanggal Habis Berlaku
            $table->integer('jumlah_peserta')->nullable(); // Jumlah Peserta
            $table->decimal('harga_paket', 16, 2)->nullable(); // Harga Paket
            $table->string('status')->nullable(); // Status
            $table->integer('user_id')->nullable(); // jika berelasi dengan tabel users
            $table->string('username')->nullable(); 
            $table->string('type', 1)->nullable(); // nama user yang terdaftar
            $table->timestamps(); // Kolom created_at dan updated_at

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket');
    }
}
