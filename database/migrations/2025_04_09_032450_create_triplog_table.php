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
        Schema::create('trip_logs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('order_number');
            $table->string('from_address');
            $table->string('to_address'); 
            $table->string('trip_purpose')->nullable();
            $table->string('trip_result')->nullable(); 
            $table->integer('start_end_mileage')->nullable();
            $table->integer('daily_mileage')->nullable();
            $table->string('fuel_amount')->nullable();
            $table->string('parking_fee')->nullable();
            $table->integer('mileage_at_fueling')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_logs');
    }
};
