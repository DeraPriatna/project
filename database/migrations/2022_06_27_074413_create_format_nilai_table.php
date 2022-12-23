<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('format_nilai', function (Blueprint $table) {
            $table->id();
            $table->integer('kelas_id');
            $table->integer('nilai_absen');
            $table->integer('nilai_tugas');
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');
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
        Schema::dropIfExists('format_nilai');
    }
}
