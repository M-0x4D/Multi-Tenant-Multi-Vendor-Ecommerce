<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShippingGovernrateTable extends Migration {

	public function up()
	{
		Schema::create('shipping_governrate', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('shipping_method_id')->unsigned();
			$table->integer('governrate_id')->unsigned();
			$table->integer('price');
		});
	}

	public function down()
	{
		Schema::drop('shipping_governrate');
	}
}