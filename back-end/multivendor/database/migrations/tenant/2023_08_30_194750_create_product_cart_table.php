<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductCartTable extends Migration {

	public function up()
	{
		Schema::create('product_cart', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('cart_id')->unsigned();
			$table->integer('product_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('product_cart');
	}
}
