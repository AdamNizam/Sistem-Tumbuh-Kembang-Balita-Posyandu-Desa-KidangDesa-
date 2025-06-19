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
        Schema::create('pertumbuhan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_balita');
            $table->float('berat_badan');
            $table->float('tinggi_badan');
            $table->float('lingkar_kepala');
            $table->date('tanggal_input');
            $table->string('kategori_pertumbuhan')->nullable();
            $table->timestamps();

            $table->foreign('id_balita')->references('id')->on('balita')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertumbuhan');
    }
};
