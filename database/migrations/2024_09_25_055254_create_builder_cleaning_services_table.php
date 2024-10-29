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
        Schema::create('builder_cleaning_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('location');
            $table->string('email');
            $table->string('service_name');
            $table->date('service_date')->nullable();
            $table->time('service_time')->nullable();
            $table->enum('type_of_commercial_space', [
                'Office',
                'Retail Store',
                'Warehouse',
                'Restaurant',
                'Other',
            ])->default('Office');
            $table->date('site_visit_date')->nullable();
            $table->text('message_box')->nullable();
            $table->integer('price');
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
        Schema::dropIfExists('builder_cleaning_services');
    }
};
