<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->id();
            $table->string('sumber_air');
            $table->string('fasilitas_mck');
            $table->string('peserta_jkn');
            $table->string('peserta_pkh');
            $table->string('nilai_aset');
            $table->string('pendapatan');
            $table->string('tempat_tinggal');
            $table->string('listrik');
            $table->string('bahan_bakar_memasak');
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
        Schema::dropIfExists('keluargas');
    }
}
