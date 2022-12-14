<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('product_price');
            $table->string('category_id');
            $table->string('brand_id');
            $table->string('detail');
            $table->string('colors');
            //$table->string('variant_product');
            $table->string('attributes');
            $table->string('sku');
            $table->string('choice_options');
            $table->longText('variation');
           // $table->string('price');
           // $table->string('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
