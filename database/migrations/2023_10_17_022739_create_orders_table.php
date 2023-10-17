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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('DonID', 10);
            $table->primary('DonID');
            $table->integer('SoKhach');
            // $table->date('NgayDat');
            $table->integer('TrangThai')->comment("0:Chưa thanh toán, 1:Đã thanh toán");
            $table->string('customer_id', 10);

            $table->foreign('customer_id')->references('KHID')->on('customers');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
