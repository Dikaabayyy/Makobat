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
        Schema::create('data_labs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_id_pasien')->constrained('data_pasiens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('kolesterol');
            $table->string('kreatinin');
            $table->string('gd_puasa');
            $table->string('gd_sewaktu');
            $table->string('gd_2jam_pp');
            $table->string('hbA1c');
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
        Schema::dropIfExists('data_labs');
    }
};
