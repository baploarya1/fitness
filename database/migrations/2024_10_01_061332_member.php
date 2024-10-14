<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Member extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_member')->nullable();
            $table->string('nama_member')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable(); // L = Laki-laki, P = Perempuan
            $table->text('alamat')->nullable();
            $table->string('nomor_ktp')->nullable();
            $table->string('nomor_handphone')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('status_member')->nullable();
            $table->date('tanggal_registrasi')->nullable();
            $table->string('photo_ktp')->nullable(); // menyimpan path foto KTP
            $table->string('photo_member')->nullable(); // menyimpan path foto member
            $table->string('nomor_kartu_member')->nullable();
            $table->integer('user_id')->nullable(); // jika berelasi dengan tabel users
            $table->string('username')->nullable(); // nama user yang terdaftar
            
            $table->timestamps(); // created_at dan updated_a
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
