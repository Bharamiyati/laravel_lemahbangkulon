<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatakeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datakeluargas', function (Blueprint $table) {
            $table->id();
            $table->string('ketersediaan_air_bersih');
            $table->string('ketersediaan_jamban_keluarga');
            $table->string('kepesertaan_jamkesmas');
            $table->string('kepesertaan_pkh');
            $table->string('kepemilikan_aset');
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
        Schema::dropIfExists('datakeluargas');
    }
}
