<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShippingAddressesTable extends Migration {

	public function up()
	{
		Schema::create('shipping_addresses', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('rememberToken')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('phone_number');
			$table->string('city', 100);
			$table->integer('governrate_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('shipping_addresses');
	}
}