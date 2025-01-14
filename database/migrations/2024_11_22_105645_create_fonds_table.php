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
        Schema::create('fonds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('total')->default(0.00);
            $table->unsignedBigInteger('expenses')->default(0.00);
            $table->unsignedBigInteger('income')->default(0.00);
            $table->boolean('specific')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fonds');
    }
};
