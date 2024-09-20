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
        Schema::create('lease_cleanings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('location');
            $table->integer('number_of_bedrooms');
            $table->integer('number_of_bathrooms');
            $table->enum('window_cleaning', ['Inside', 'Outside', 'Both']);
            $table->boolean('oven_cleaning')->default(false);
            $table->boolean('stove_cleaning')->default(false);
            $table->integer('number_of_walls_cleaned');
            $table->string('carpet_steam_cleaning_area');
            $table->enum('carpet_steam_cleaning_unit', ['sqft', 'sqm']);
            $table->date('service_date');
            $table->time('service_time');
            $table->text('message')->nullable();
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
        Schema::dropIfExists('lease_cleanings');
    }
};
