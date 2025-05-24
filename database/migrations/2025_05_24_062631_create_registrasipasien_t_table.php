<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasipasienTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasipasien_t', function (Blueprint $table) {
            $table->uuid('norec')->primary();
            $table->boolean('statusenabled')->default(true)->nullable();
            $table->unsignedBigInteger('noregistrasi', 10)->nullable();
            $table->unsignedBigInteger('nocmfk')->nullable();
            $table->date('tglregistrasi')->nullable();
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
        Schema::dropIfExists('registrasipasien_t');
    }
}
