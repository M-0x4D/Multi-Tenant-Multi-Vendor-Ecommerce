<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('order_number' , 20);
            $table->integer('user_id');
            $table->integer('address_id');
            $table->integer('payment_method_id');
            $table->integer('shippment_method_id');
			$table->date('order_date_time');
			$table->decimal('total_price', 8,2);
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}
