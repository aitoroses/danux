<?php

class Create_Accext_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('l_accext_wardrobe_relation_table', function($table){
			$table->increments('id');
			$table->integer('wardrobe_id');
			$table->integer('accext_id'); //Una sola tabla de accesorios
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
		Schema::drop('l_accext_wardrobe_relation_table');
	}

}