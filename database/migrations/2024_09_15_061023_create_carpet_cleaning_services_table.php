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
        Schema::create('carpet_cleaning_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('location');
            $table->date('service_date');
            $table->time('service_time');
            $table->float('carpet_steam_cleaning_area');
            $table->enum('carpet_steam_cleaning_unit', ['sqft', 'sqm']);
            $table->float('carpet_stain_cleaning_area');
            $table->enum('carpet_stain_cleaning_unit', ['sqft', 'sqm']);
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
        Schema::dropIfExists('carpet_cleaning_services');
    }
};
