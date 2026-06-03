<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('car_feature_map', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained('cars')->cascadeOnDelete();
            $table->foreignId('feature_id')->constrained('car_features')->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['car_id','feature_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_feature_map');
    }
};
