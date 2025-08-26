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
        Schema::create('participations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donator_id');
            $table->unsignedBigInteger('selection_id');
            $table->timestamps();

            $table->foreign('donator_id')->references('id')->on('donators')->onDelete('cascade');
            $table->foreign('selection_id')->references('id')->on('selections')->onDelete('cascade');

            $table->unique(['donator_id', 'selection_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participations');
    }
};
