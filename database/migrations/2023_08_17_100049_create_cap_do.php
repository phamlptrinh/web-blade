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
        Schema::create('cap_do', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->id();
            $table->string('ghi_chu');
            $table->timestamps();
            
            $table->string('ten',30);
            
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cap_do');
    }
};
