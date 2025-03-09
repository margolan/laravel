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
        Schema::create('kanbans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text');
            $table->string('priority');
            $table->string('status');
            $table->string('author');
            $table->string('va1')->nullable();
            $table->string('va2')->nullable();
            $table->string('va3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kanbans');
    }
};
