<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('category_id')->unsigned();
			$table->integer('subcategory_id')->unsigned();
			$table->string('name', 100);
			$table->decimal('price', 8,2);
            $table->integer('qty');
			$table->text('description');
			$table->string('short_description' , 150);
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}
