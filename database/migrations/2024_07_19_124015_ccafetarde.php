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
        Schema::create('ccafetarde', function (Blueprint $table) {
            $table->id();
            $table->string('caftalimento', 255);
            $table->float('caftkcal');
            $table->float('caftqtd');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("ccafetarde");
    }
};
