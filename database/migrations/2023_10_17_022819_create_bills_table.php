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
        Schema::create('bills', function (Blueprint $table) {
            $table->string('DHID', 10);
            $table->primary('DHID');
            // $table->date('Ngaytao');
            $table->decimal('PhuThu', 10, 2)->nullable();
            $table->decimal('TongTien', 10,2)->nullable();
            $table->string('staff_id', 10);
            $table->string('order_id', 10);

            $table->foreign('staff_id')->references('NVID')->on('staffs');
            $table->foreign('order_id')->references('DonID')->on('orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
