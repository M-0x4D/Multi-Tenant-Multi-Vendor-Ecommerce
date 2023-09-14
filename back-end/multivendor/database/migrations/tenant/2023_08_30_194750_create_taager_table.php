<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaagerTable extends Migration {

	public function up()
	{
		Schema::create('taager', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
			$table->string('email', 100);
			$table->string('password', 100);
			$table->integer('phone_number');
			$table->string('otp', 10)->nullable();
			$table->boolean('otp_valid')->default(0);
            $table->boolean('commercial_registry_valid')->default(0);
            $table->boolean('tax_card_valid')->default(0);
			$table->date('email_verified_at')->nullable();
			$table->date('phone_verified_at')->nullable();
			$table->enum('status', array('active', 'pending'))->default('pending');
			$table->boolean('paid')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('taager');
	}
}
