<?php

class Create_Accint_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('l_accint_table', function($table){
			$table->increments('id');
			$table->integer('wardrobe_id');
			$table->integer('acc_id'); //Una sola tabla de accesorios
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
		Schema::drop('l_accint_table');
	}

}