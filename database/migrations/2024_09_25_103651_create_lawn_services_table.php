<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lawn_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('location');
            $table->string('email');
            $table->date('service_date')->nullable();
            $table->time('service_time')->nullable();
            $table->integer('price');
            $table->enum('type_of_lawn_service', [
                'Mowing',
                'Trimmimg',
                'Weeding',
                'Pruning',
                'Other',
            ])->default('Mowing');
            $table->text('message_box')->nullable();
            $table->enum('status', ['Pending', 'Cancelled', 'Approved'])->default('Pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawn_services');
    }
};
