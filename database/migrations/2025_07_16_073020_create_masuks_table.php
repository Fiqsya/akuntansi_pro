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
        Schema::create('masuks', function (Blueprint $table) {
            $table->id();
            $table->string('id_produk');
            $table->string('id_supplier');
            $table->string('tanggal');
            $table->string('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masuks');
    }
};
