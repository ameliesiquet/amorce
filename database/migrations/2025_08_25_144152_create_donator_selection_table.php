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
        Schema::create('donator_selection', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donator_id')->constrained()->onDelete('cascade');
            $table->foreignId('selection_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('status_in_selection')->default(1); // 1, 2 oder 3
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donator_selection');
    }
};
