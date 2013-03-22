<?php

class Create_Accint_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accint_table', function($table){
			$table->increments('id');
			$table->integer('wardrobe_id');
			$table->integer('accint_ids');
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
		Schema::drop('accint_table');
	}

}