<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilpemeriksaanTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasilpemeriksaan_t', function (Blueprint $table) {
            $table->uuid('norec')->primary();
            $table->boolean('statusenabled')->default(true)->nullable();
            $table->string('norec_rpfk', 36);
            $table->unsignedBigInteger('perawatfk')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('tekanan_darah')->nullable();
            $table->unsignedBigInteger('dokterfk')->nullable();
            $table->text('keluhan')->nullable();
            $table->text('diagnosa')->nullable();
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
        Schema::dropIfExists('hasilpemeriksaan_t');
    }
}
