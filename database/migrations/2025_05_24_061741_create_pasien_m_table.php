<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien_m', function (Blueprint $table) {
            $table->id();
            $table->string('nocm', 8)->nullable();
            $table->string('nama')->nullable();
            $table->date('tgllahir')->nullable();
            $table->enum('jeniskelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('nohp')->nullable();
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
        Schema::dropIfExists('pasien_m');
    }
}
