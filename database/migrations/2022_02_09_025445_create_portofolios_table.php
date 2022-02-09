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
            $table->string('perusahaan', 100);
            $table->string('tahun', 4);
            $table->integer('jenis_id');
            $table->string('kapasitas', 100);
            $table->integer('teknologi_id');
            $table->string('nilai_kontrak', 500);
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
