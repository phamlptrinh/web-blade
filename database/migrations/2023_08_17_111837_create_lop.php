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
        Schema::create('lop', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ten');
            $table->unsignedBigInteger('chi_nhanh_id')->nullable();
            $table->unsignedBigInteger('giang_vien_id')->nullable();
            $table->unsignedBigInteger('cap_do_id')->nullable();
            $table->date('ngay_bat_dau');//ko duoc de trong
            $table->date('ngay_ket_thuc');//ko duoc de trong
            $table->string('thoi_luong',3);
            // chua co thoi khoa bieu

            $table->foreign('giang_vien_id')->references('id')->on('giang_vien');
            $table->foreign('chi_nhanh_id')->references('id')->on('chi_nhanh');
            $table->foreign('cap_do_id')->references('id')->on('cap_do');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lop');
    }
};
