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

        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->text('names');
            $table->text('data');
            $table->text('dates');
            $table->text('date');
            $table->text('city');
            $table->text('depart');
            $table->text('var1')->nullable();
            $table->text('var2')->nullable();
            $table->text('var3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
