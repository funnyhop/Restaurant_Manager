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
        Schema::create('staffs', function (Blueprint $table) {
            $table->string('NVID', 10);
            $table->primary('NVID');
            $table->string('TenNV', 50);
            $table->Date('NgaySinh');
            $table->string('GT', 5);
            $table->string('DiaChi');
            $table->string('ChucVu', 50);
            $table->string('SDT', 10);
            $table->string('email');
            $table->string('password');
            $table->tinyInteger('role_id')->comment("1: admin, 2: Thu ngân, 3: Nhân viên");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
