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
        Schema::create('prices', function (Blueprint $table) {
            $table->date('day_id', 10);
            $table->string('dish_id', 10);
            $table->primary(['day_id', 'dish_id']);
            $table->decimal('Gia', 10,2);

            $table->foreign('day_id')->references('Ngay')->on('days');
            $table->foreign('dish_id')->references('MonID')->on('dishes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
