<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('selected_car_model')->nullable();
            $table->text('service_location')->nullable();
            $table->dateTime('scheduled_datetime')->nullable();
            $table->longText('message')->nullable();
            $table->enum('status',[
    'pending',
    'contacted',
    'completed',
    'cancelled',
])->default('in_progress');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
