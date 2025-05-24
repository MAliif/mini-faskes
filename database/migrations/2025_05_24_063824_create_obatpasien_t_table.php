<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatpasienTTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obatpasien_t', function (Blueprint $table) {
            $table->uuid('norec')->primary();
            $table->boolean('statusenabled')->default(true)->nullable();
            $table->string('norec_rpfk', 36);
            $table->unsignedBigInteger('obatfk');
            $table->integer('jumlah')->nullable();
            $table->string('aturan_pakai')->nullable();
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
        Schema::dropIfExists('obatpasien_t');
    }
}
