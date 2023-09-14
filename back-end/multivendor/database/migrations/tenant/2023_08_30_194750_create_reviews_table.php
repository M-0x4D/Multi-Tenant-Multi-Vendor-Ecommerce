<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewsTable extends Migration {

	public function up()
	{
		Schema::create('reviews', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('rate');
			$table->text('comment')->nullable();
			$table->integer('reviewable_id');
            $table->integer('user_id')->nullable();
			$table->string('reviewable_type', 100);
		});
	}

	public function down()
	{
		Schema::drop('reviews');
	}
}
