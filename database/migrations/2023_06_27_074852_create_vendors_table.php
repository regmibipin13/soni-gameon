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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('name');

            $table->string('city');
            $table->string('address');
            $table->string('zipcode');
            $table->string('google_map_link')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('status')->default('pending');
            $table->boolean('is_banned')->default(false);
            $table->string('banned_reason')->nullable();
            $table->boolean('is_close')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
