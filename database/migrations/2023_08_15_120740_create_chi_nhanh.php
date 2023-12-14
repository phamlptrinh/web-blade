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
        Schema::create('chi_nhanh', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ten')->unique();
            $table->string('dia_chi');
            $table->string('phuong_xa');
            $table->string('quan_huyen');
            $table->string('tinh_tp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_nhanh');
    }
};
