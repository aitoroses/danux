<?php

class Create_Materials_Door_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('l_materials_door_table', function($table){
			$table->increments('id');
			$table->integer('door_id');
			$table->integer('material_id');
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
		Schema::drop('l_materials_door_table');
	}

}