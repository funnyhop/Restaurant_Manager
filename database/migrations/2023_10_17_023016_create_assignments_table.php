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
        Schema::create('assignments', function (Blueprint $table) {
            $table->string('staff_id', 10);
            $table->date('day_id');
            $table->string('dinnertb_id', 10);

            $table->primary(['staff_id', 'dinnertb_id', 'day_id']);
            $table->foreign('staff_id')->references('NVID')->on('staffs');
            $table->foreign('day_id')->references('Ngay')->on('days');
            $table->foreign('dinnertb_id')->references('BanID')->on('dinnertbs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
