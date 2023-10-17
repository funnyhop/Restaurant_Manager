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
        Schema::create('dishes', function (Blueprint $table) {
            $table->string('MonID', 10);
            $table->primary('MonID');
            $table->string('TenMon', 50);
            $table->string('DVT', 10);
            $table->string('foodgr_id', 10);

            $table->foreign('foodgr_id')->references('NhomID')->on('foodgrs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
