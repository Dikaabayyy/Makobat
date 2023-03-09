<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('schedule_pasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_id_pasien')->constrained('data_pasiens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('schedule');
            $table->boolean('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('schedule_pasiens');
    }
};
