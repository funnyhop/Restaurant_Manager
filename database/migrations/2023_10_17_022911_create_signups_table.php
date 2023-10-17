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
        Schema::create('signups', function (Blueprint $table) {
            $table->string('staff_id', 10);
            $table->date('day_id');
            $table->string('shift_id', 10);

            $table->primary(['staff_id', 'shift_id', 'day_id']);
            $table->foreign('staff_id')->references('NVID')->on('staffs');
            $table->foreign('day_id')->references('Ngay')->on('days');
            $table->foreign('shift_id')->references('CaID')->on('shifts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signups');
    }
};
