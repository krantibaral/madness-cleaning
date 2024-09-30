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
        Schema::create('appointment_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('location');
            $table->string('email');
            $table->date('service_date');
            $table->boolean('handyman_jobs')->default(false); 
            $table->boolean('plumbers')->default(false); 
            $table->boolean('electricians')->default(false); 
            $table->boolean('builders')->default(false); 
            $table->boolean('real_estate_agents')->default(false);
            $table->boolean('locksmiths')->default(false);
            $table->boolean('landscapers')->default(false); 
            $table->boolean('tree_loopers')->default(false);
            $table->boolean('painters')->default(false); 
            $table->boolean('glass_repairers')->default(false); 
            $table->boolean('blinds_and_curtain_fitters')->default(false); 
            $table->boolean('flooring')->default(false); 
            $table->boolean('carpet_layers')->default(false); 
            $table->boolean('tilers')->default(false); 
            $table->boolean('event_planners')->default(false); 
            $table->boolean('photographers')->default(false); 
            $table->boolean('cabinet_maker')->default(false); 
            $table->boolean('pest_control')->default(false); 
            $table->boolean('removalists')->default(false); 
            $table->boolean('cctv_installer')->default(false); 
            $table->text('message_box')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_bookings');
    }
};
