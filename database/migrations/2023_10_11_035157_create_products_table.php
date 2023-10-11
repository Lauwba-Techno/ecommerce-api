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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->foreignId('subcategory_id')->constrained('subcategories', 'subcategory_id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('product_name', 200);
            $table->text('product_desc');
            $table->integer('product_stock');
            $table->double('product_price');
            $table->text('product_image');
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
};
