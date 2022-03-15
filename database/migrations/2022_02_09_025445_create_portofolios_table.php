<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortofoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portofolio', function (Blueprint $table) {
            $table->integer('klien_id');
            $table->id();
            $table->string('perusahaan', 200);
            $table->double('tahun', 4);
            $table->integer('jenis_id');
            $table->double('kapasitas');
            $table->integer('teknologi_id');
            $table->string('nilai_kontrak');
            $table->integer('status_id');
            $table->string('gallery')->nullable();
            $table->integer('inquiry_id')->nullable();
            $table->string('penawaran')->nullable();
            $table->string('spk_po_wo')->nullable();
            $table->string('berita_acara_instal')->nullable();
            $table->string('berita_acara_comisioning')->nullable();
            $table->string('berita_acara_sampling')->nullable();
            $table->string('laporan_hasil_uji')->nullable();
            $table->string('berita_acara_kerja_tambah')->nullable();
            $table->string('berita_acara_serah_terima')->nullable();
            $table->string('gambar_desain')->nullable();
            $table->string('gambar_asbuilt')->nullable();
            $table->string('sop')->nullable();
            $table->string('dokumentasi')->nullable();
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
        Schema::dropIfExists('portofolio');
    }
}
