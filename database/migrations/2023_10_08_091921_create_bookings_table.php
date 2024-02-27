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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->unsignedBigInteger('sport_id');
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->date('date');
            $table->time('from_time');
            $table->time('to_time');
            $table->double('total_billed_amount')->default(0);
            $table->double('paid_amount')->default(0);
            $table->double('total_discount')->default(0);
            $table->double('total_tax')->default(0);
            $table->double('grand_total_paid')->default(0);
            $table->string('payment_gateway');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
