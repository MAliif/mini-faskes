<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_m', function (Blueprint $table) {
            $table->id();
            $table->string('namalengkap')->nullable();
            $table->enum('jeniskelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->unsignedBigInteger('rolefk')->nullable();
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
        Schema::dropIfExists('pegawai_m');
    }
}
