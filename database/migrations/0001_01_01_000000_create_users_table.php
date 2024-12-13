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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->collation('utf8_general_ci');
            $table->string('address');
            $table->string('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 191)->primary()->collation('utf8_general_ci'); // Set collation to utf8
            $table->string('token', 191)->collation('utf8_general_ci'); // Set collation to utf8
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id', 191)->primary()->collation('utf8_general_ci'); // Reduced length & collation to utf8
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable()->collation('utf8_general_ci');
            $table->text('user_agent')->nullable()->collation('utf8_general_ci');
            $table->longText('payload')->collation('utf8_general_ci');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
