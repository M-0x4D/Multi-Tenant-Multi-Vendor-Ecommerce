<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	public function up()
	{
		Schema::create('offers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_id')->unsigned();
			$table->decimal('percentage', 8,2);
			$table->date('from_date');
			$table->date('to_date');
			// $table->integer('category_id')->unsigned();
			// $table->integer('subcategory_id')->unsigned();
			// $table->string('image', 200);
		});
	}

	public function down()
	{
		Schema::drop('offers');
	}
}
