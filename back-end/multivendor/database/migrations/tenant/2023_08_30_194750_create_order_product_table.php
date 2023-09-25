<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderProductTable extends Migration
{

    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('order_id')->unsigned();
            $table->unsignedInteger('product_id');

            // $table->foreign('product_id')
            //   ->references('id')
            //   ->on('products')->onDelete('cascade');


            $table->integer('size_id')->nullable();


            $table->decimal('price_at_this_time', 8, 2);
        });
    }

    public function down()
    {
        Schema::drop('order_product');
    }
}
