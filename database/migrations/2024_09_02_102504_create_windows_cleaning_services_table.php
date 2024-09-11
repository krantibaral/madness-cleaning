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
        Schema::create('windows_cleaning_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('location');
            $table->integer('number_of_windows');
            $table->integer('number_of_story');
            $table->date('service_date');
            $table->time('service_time');
            $table->text('message')->nullable();
            $table->enum('type', ['Inside', 'Outside']);
            $table->enum('windows_track_frame', ['Track', 'Frame']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('windows_cleaning_services');
    }
};
