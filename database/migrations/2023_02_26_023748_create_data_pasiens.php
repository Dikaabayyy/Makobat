<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_id_user')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('nik');
            $table->string('slug');
            $table->string('gender');
            $table->date('tgl_lahir');
            $table->string('pengawasan_dokter')->default('-');
            $table->string('bb');
            $table->string('tb');
            $table->string('td_tds');
            $table->string('td_tdd');
            $table->string('h_rate');
            $table->string('klasifikasi');
            $table->string('diet');
            $table->string('alcohol');
            $table->boolean('status')->default('0');
            $table->string('cigarettes');
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
        Schema::dropIfExists('data_pasiens');
    }
};
