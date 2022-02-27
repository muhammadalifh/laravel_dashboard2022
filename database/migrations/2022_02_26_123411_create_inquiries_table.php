<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry', function (Blueprint $table) {
            $table->id();
            $table->string('inquiry_perusahaan', 200);
            $table->string('inquiry_alamat');
            $table->string('inquiry_nama');
            $table->double('inquiry_no_telp', 12);
            $table->string('inquiry_email');
            $table->string('inquiry_jenis_kegiatan');
            $table->string('inquiry_lokasi_kegiatan');
            $table->integer('inquiry_sumber_air_limbah_id');
            $table->double('inquiry_debit_air_limbah');
            $table->double('inquiry_luas_lahan_rencana');
            $table->double('inquiry_penggunaan_air_bersih');
            $table->double('inquiry_jumlah_karyawan');
            $table->double('inquiry_jumlah_tamu');
            $table->string('inquiry_upload_data')->nullable(true);
            $table->string('inquiry_keterangan_tambahan')->nullable(true);
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
        Schema::dropIfExists('inquiry');
    }
}
