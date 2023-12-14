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
        Schema::create('hoc_vien', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ten');
            $table->date('ngay_sinh');
            $table->string('email')->unique();
            $table->string('sdt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoc_vien');
    }
};
