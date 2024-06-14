<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dpd_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('kewarganegaraan');
            $table->string('tempat_tanggal_lahir');
            $table->string('partai');
            $table->string('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->text('visi_misi');
            $table->text('pendidikan');
            $table->text('pengalaman_kerja');
            $table->text('organisasi');
            $table->text('prestasi');
            $table->string('foto')->nullable(); // Tambahkan kolom foto
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dpd_submissions');
    }
};
