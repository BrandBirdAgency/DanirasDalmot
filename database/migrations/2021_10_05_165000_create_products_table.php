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
            $table->string('name', 191);
            $table->text('photo');
            $table->text('description');
            $table->tinyInteger('in_stock')->default(0);
            $table->tinyInteger('home')->default(0);
            $table->double('retail_price', 8, 2);
            $table->integer('discount');
            $table->integer('price');
            $table->tinyInteger('category');
            $table->text('brand_name');
            $table->text('size');
            $table->text('qr_code')->nullable();
            $table->text('qr_path')->nullable();
            $table->text('bar_path')->nullable();
            $table->text('bar_code')->nullable();
            $table->text('bar_number')->nullable();
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
