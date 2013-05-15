<?php

class Create_Modules_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('l_modules_table', function($table){
			$table->increments('id');
			$table->integer('wardrobe_id');
			$table->integer('double');
			$table->integer('ddouble');
			$table->integer('width');
			$table->integer('height');
			$table->integer('ref1');
			$table->integer('ref2');
			$table->text('configuration');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('l_modules_table');
	}

}