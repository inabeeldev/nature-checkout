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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->enum('seller_type', ['vendor', 'supplier']);
            $table->string('sku');
            $table->string('title');
            $table->string('meta_title')->default('Product Title');
            $table->string('slug');
            $table->longText('description');
            $table->longText('meta_description')->default('Product Description');
            $table->longText('meta_keywords')->nullable();
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('condition_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('retail_price', 10, 2);
            $table->decimal('wholesale_price', 10, 2)->nullable();
            $table->decimal('shipping_price', 10, 2)->nullable();
            $table->string('sales_tax_state')->nullable();
            $table->float('sales_tax_pct')->nullable();
            $table->enum('in_stock', ['yes', 'no'])->default('yes');
            $table->integer('stock_quantity');
            $table->string('image');
            $table->string('extra_img_1')->nullable();
            $table->string('extra_img_2')->nullable();
            $table->string('extra_img_3')->nullable();
            $table->string('extra_img_4')->nullable();
            $table->string('extra_img_5')->nullable();
            $table->string('extra_img_6')->nullable();
            $table->string('extra_img_7')->nullable();
            $table->string('extra_img_8')->nullable();
            $table->string('extra_img_9')->nullable();
            $table->string('extra_img_10')->nullable();
            $table->longText('return_policy')->nullable();
            $table->bigInteger('avg_shipping_days')->nullable();
            $table->enum('status', ['enable', 'disable'])->default('enable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
