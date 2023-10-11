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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_file_id')->unsigned();
            $table->integer('unique_key')->nullable();
            $table->string('product_title', 100)->nullable();
            $table->text('product_describe')->nullable();
            $table->string('styles', 200)->nullable();
            $table->string('available_sizes', 200)->nullable();
            $table->string('brand_logo_image', 100)->nullable();
            $table->string('thumbnail_image', 100)->nullable();
            $table->string('color_swatch_image', 100)->nullable();
            $table->string('product_image', 100)->nullable();
            $table->string('spec_sheet', 100)->nullable();
            $table->string('price_text', 100)->nullable();
            $table->string('suggested_price', 100)->nullable();
            $table->string('category_name', 100)->nullable();
            $table->string('subcategory_name', 100)->nullable();
            $table->string('color_name', 100)->nullable();
            $table->string('color_square_image', 100)->nullable();
            $table->string('color_product_image', 100)->nullable();
            $table->string('color_product_image_thumbnail', 100)->nullable();
            $table->string('size', 5)->nullable();
            $table->integer('qty')->default(0)->nullable();
            $table->double('piece_weight', 5.2)->default(0)->nullable();
            $table->double('piece_price', 10.2)->default(0)->nullable();
            $table->double('dozens_price', 10.2)->default(0)->nullable();
            $table->double('case_price', 10.2)->default(0)->nullable();
            $table->string('price_group', 5)->nullable();
            $table->integer('case_size')->default(0)->nullable();
            $table->integer('inventory_key')->default(0)->nullable();
            $table->integer('size_index')->default(0)->nullable();
            $table->string('sanmar_mainframe_color', 100)->nullable();
            $table->string('mill', 100)->nullable();
            $table->string('product_status', 100)->nullable();
            $table->string('companion_styles', 100)->nullable();
            $table->double('msrp', 10.2)->default(0)->nullable();
            $table->double('map_princing', 10.2)->default(0)->nullable();
            $table->string('front_model_image_url', 150)->nullable();
            $table->string('back_model_image', 100)->nullable();
            $table->string('front_flat_image', 100)->nullable();
            $table->string('back_flat_image', 100)->nullable();
            $table->string('product_measurements', 100)->nullable();
            $table->string('pms_color', 100)->nullable()->nullable();
            $table->bigInteger('gtin')->default(0)->nullable();
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