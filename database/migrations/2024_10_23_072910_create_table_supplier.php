<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('kode_supplier')->nullable();
            $table->string('nama_supplier')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('nama_kontak')->nullable();
            $table->integer('user_id')->nullable(); // jika berelasi dengan tabel users
            $table->string('username')->nullable(); 
            $table->string('type', 1)->nullable(); // nama user yang terdaftar
            $table->timestamps(); // Kolom created_at dan updated_at
        });
        Schema::table('pembelian', function (Blueprint $table) {
            $table->string('kode_supplier')->nullable(); 
            $table->string('nama_supplier')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier');
    }
}
