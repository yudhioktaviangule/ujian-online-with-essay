<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalPilihanGandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_pilihan_gandas', function (Blueprint $table) {
            $table->id();
            $table->longtext("soal");
            $table->integer("nomor");
            $table->integer("jadwal_id");
            $table->string("soal_a");
            $table->string("soal_b");
            $table->string("soal_c");
            $table->string("soal_d");
            $table->enum("kunci",['a','b','c','d']);
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
        Schema::dropIfExists('soal_pilihan_gandas');
    }
}
