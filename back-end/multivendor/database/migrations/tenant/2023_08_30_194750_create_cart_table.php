<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartTable extends Migration {

	public function up()
	{
		Schema::create('cart', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('user_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('cart');
	}
}
