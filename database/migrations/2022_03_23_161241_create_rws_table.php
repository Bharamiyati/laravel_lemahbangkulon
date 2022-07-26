<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rws', function (Blueprint $table) {
            $table->id();
            $table->string('rw');
            $table->string('nama_ketua_rw');
            $table->unsignedBigInteger('dusun_id');
            $table->foreign('dusun_id')->references('id')->on('dusuns')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('rws');
    }
}
