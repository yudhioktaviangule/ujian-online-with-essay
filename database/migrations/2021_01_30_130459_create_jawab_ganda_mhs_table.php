<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabGandaMhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawab_ganda_mhs', function (Blueprint $table) {
            $table->id();
            $table->integer('soal_ganda_id');
            $table->integer('reg_ujian_id');
            $table->enum('jawaban',['a','b','c','d']);
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
        Schema::dropIfExists('jawab_ganda_mhs');
    }
}
