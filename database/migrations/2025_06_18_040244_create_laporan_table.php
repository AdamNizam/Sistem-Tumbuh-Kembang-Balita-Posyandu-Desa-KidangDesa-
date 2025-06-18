<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();

            $table->string('periode');
            $table->text('isi_laporan');

            $table->unsignedBigInteger('id_balita');
            $table->unsignedBigInteger('id_pertumbuhan');
            $table->unsignedBigInteger('id_jadwal');


            $table->foreign('id_balita')->references('id')->on('balita')->onDelete('cascade');
            $table->foreign('id_pertumbuhan')->references('id')->on('pertumbuhan')->onDelete('cascade');
            $table->foreign('id_jadwal')->references('id')->on('jadwal')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
