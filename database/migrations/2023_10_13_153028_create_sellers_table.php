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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->enum('seller_type', ['vendor', 'supplier']);
            $table->string('stripe_customer_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('phone_number');
            $table->string('address');
            $table->foreignId('country_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('state_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('city_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('zip_code');
            $table->float('lat')->nullable();
            $table->float('long')->nullable();
            $table->string('wallet_amount')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_routing_number')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('iban')->nullable();
            $table->string('business_name')->nullable();
            $table->string('tax_id')->nullable();
            $table->float('website_link')->nullable();
            $table->enum('status', ['active', 'deactive']);
            $table->enum('is_approved', ['0', '1'])->default('1');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
