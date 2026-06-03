<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->foreignId('model_id')->constrained('car_models')->cascadeOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->decimal('price', 12, 2)->nullable();
            $table->decimal('discount_price', 12, 2)->nullable();

            $table->year('year')->nullable();
            $table->year('registration_year')->nullable();

            $table->enum('fuel_type', ['petrol','diesel','hybrid','electric','other'])->nullable();
            $table->enum('transmission', ['manual','automatic','semi-automatic'])->nullable();

            $table->string('ownership')->nullable();
            $table->string('color')->nullable();
            $table->integer('mileage')->nullable();
            $table->string('engine_cc')->nullable();
            $table->string('power')->nullable();
            $table->string('torque')->nullable();
            $table->integer('seating_capacity')->nullable();
            $table->date('insurance_valid_till')->nullable();
            $table->string('registration_state')->nullable();
            $table->string('registration_city')->nullable();
            $table->string('vin_number')->nullable()->unique();
            $table->string('stock_number')->nullable()->index();

            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->boolean('featured')->default(false)->index();
            $table->boolean('sold')->default(false)->index();
            $table->enum('status', ['draft','published','archived'])->default('published')->index();

            $table->unsignedBigInteger('views')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
