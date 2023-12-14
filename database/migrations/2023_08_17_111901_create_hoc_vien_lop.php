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
        Schema::create('hoc_vien_lop', function (Blueprint $table) {
            $table->foreignId('hoc_vien_id')->constrained(
                table: 'hoc_vien', indexName: 'hoc_vien_lop_id');
            $table->foreignId('lop_id')->constrained(
                table: 'lop', indexName: 'lop_hoc_vien_id');
            
            $table->primary(['hoc_vien_id', 'lop_id']);
            $table->timestamps();

            /*
            $table->unsignedBigInterger('hoc_vien_id');
            $table->unsignedBigInterger('hoc_vien_id');

            $table->primary(['hoc_vien_id', 'lop_id']);

            gan 2 cai foreignKey

            */

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoc_vien_lop');
    }
};
