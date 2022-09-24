<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('product_id');
            $table->string('cart_group_id');
            $table->string('color');
            $table->string('choices');
            $table->string('variations');
            $table->string('variant');
            $table->string('quantity');
            $table->string('price');
            $table->string('slug');
            $table->string('product_name');
            $table->string('seller_id');
            $table->string('seller_is');

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
        Schema::dropIfExists('carts');
    }
};
