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
        Schema::create('rubbish_removal_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('location');
            $table->string('email');
            $table->string('service_name');
            $table->date('service_date');
            $table->time('service_time');
            $table->integer('price');
            $table->integer('number_of_tyres'); 
            $table->integer('number_of_furniture'); 
            $table->integer('number_of_mattress');
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
        Schema::dropIfExists('rubbish_removal_services');
    }
};
