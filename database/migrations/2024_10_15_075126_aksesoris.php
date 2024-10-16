<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Aksesoris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aksesoris', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id secara otomatis
            $table->string('kode_aksesoris')->nullable();
            $table->string('nama_aksesoris')->nullable();
            $table->decimal('harga', 16, 2)->nullable();
            $table->decimal('stok_awal', 8, 2)->nullable();
            $table->decimal('stok_akhir', 8, 2)->nullable();
            $table->decimal('barang_masuk', 8, 2)->nullable();
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
        Schema::dropIfExists('aksesoris');
    }
}
