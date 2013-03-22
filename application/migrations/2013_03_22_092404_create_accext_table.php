<?php

class Create_Accext_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accext_table', function($table){
			$table->increments('id');
			$table->integer('wardrobe_id');
			$table->integer('accext_ids');
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
		Schema::drop('accext_table');
	}

}