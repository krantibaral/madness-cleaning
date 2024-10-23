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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Foreign keys for different service types
            $table->unsignedBigInteger('window_cleaning_service_id')->nullable();
            $table->foreign('window_cleaning_service_id')->references('id')->on('windows_cleaning_services')->onDelete('cascade');

            $table->unsignedBigInteger('house_cleaning_service_id')->nullable();
            $table->foreign('house_cleaning_service_id')->references('id')->on('house_cleaning_services')->onDelete('cascade');

            $table->unsignedBigInteger('lease_cleaning_service_id')->nullable();
            $table->foreign('lease_cleaning_service_id')->references('id')->on('lease_cleanings')->onDelete('cascade');

            $table->unsignedBigInteger('carpet_cleaning_service_id')->nullable();
            $table->foreign('carpet_cleaning_service_id')->references('id')->on('carpet_cleaning_services')->onDelete('cascade');

            $table->unsignedBigInteger('commercial_cleaning_service_id')->nullable();
            $table->foreign('commercial_cleaning_service_id')->references('id')->on('commercial_cleaning_services')->onDelete('cascade');

            $table->unsignedBigInteger('builder_cleaning_service_id')->nullable();
            $table->foreign('builder_cleaning_service_id')->references('id')->on('builder_cleaning_services')->onDelete('cascade');

            $table->unsignedBigInteger('lawn_service_id')->nullable();
            $table->foreign('lawn_service_id')->references('id')->on('lawn_services')->onDelete('cascade');

            $table->unsignedBigInteger('rubbish_removal_service_id')->nullable();
            $table->foreign('rubbish_removal_service_id')->references('id')->on('rubbish_removal_services')->onDelete('cascade');


            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
