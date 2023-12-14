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
        Schema::create('giang_vien', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ten');
            $table->string('email')->unique();
            $table->string('sdt');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giang_vien');
    }
};
