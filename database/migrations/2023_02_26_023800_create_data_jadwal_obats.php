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
        Schema::create('data_jadwal_obats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_id_pasien')->constrained('data_pasiens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_obat');
            $table->string('dosis_harian');
            $table->string('waktu_minum');
            $table->time('waktu');
            $table->string('jumlah_obat');
            $table->string('pengawasan')->default('-');
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
        Schema::dropIfExists('data_jadwal_obats');
    }
};
