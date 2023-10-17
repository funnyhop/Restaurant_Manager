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
        Schema::create('ghidhs', function (Blueprint $table) {
            $table->string('order_id', 10);
            $table->string('dish_id', 10);
            $table->primary(['order_id', 'dish_id']);
            $table->integer('SoLuong');

            $table->foreign('order_id')->references('DonID')->on('orders');
            $table->foreign('dish_id')->references('MonID')->on('dishes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ghidhs');
    }
};
