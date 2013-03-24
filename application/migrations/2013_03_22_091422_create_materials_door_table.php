<?php

class Create_Materials_Door_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('l_door_material_relation_table', function($table){
			$table->increments('id');
			$table->integer('door_id');
			$table->integer('doormaterial_id');
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
		Schema::drop('l_door_material_relation_table');
	}

}