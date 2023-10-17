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
        Schema::create('dh_banans', function (Blueprint $table) {
            $table->string('order_id', 10);
            $table->string('dinnertb_id', 10);
            $table->primary(['order_id', 'dinnertb_id']);

            $table->foreign('order_id')->references('DonID')->on('orders');
            $table->foreign('dinnertb_id')->references('BanID')->on('dinnertbs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dh_banans');
    }
};
