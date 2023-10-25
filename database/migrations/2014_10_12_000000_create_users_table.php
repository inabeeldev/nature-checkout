<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('social_id');
            $table->string('stripe_customer_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_code')->nullable();
            $table->string('phone_number');
            $table->string('address');
            $table->foreignId('country_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('state_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('city_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('image')->nullable();
            $table->decimal('wallet_amount', 10, 2)->nullable();
            $table->enum('status', ['active', 'deactive']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
