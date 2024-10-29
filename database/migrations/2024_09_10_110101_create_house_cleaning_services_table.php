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
        Schema::create('house_cleaning_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('location');
            $table->integer('number_of_bedroom');
            $table->integer('number_of_bathroom');
            $table->integer('number_of_story');
            $table->enum('frequency', ['Weekly','Fortnightly', 'Monthly']);
            $table->string('service_name');
            $table->date('service_date');
            $table->time('service_time');
            $table->integer('price');
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
        Schema::dropIfExists('house_cleaning_services');
    }
};
