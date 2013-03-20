<?php

class Create_Wardrobe_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wardrobe_table', function($table){
			$table->increments('id');
			$table->integer('budget_id');
			$table->string('name');
			$table->string('width');
			$table->string('height');
			$table->string('prof');
			$table->string('nmods');
			$table->string('doors');
			$table->string('typedoor');
			$table->string('paritypos');
			$table->string('handle');
			$table->string('tperfil');
			$table->string('perfil');
			$table->string('marco');
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
		Schema::drop('wardrobe_table');
	}

}