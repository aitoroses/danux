<?php

class Accint_Module_Relation_Table {

	public function up()
	{
		Schema::create('l_accint_module_relation_table', function($table){
			$table->increments('id');
			$table->integer('module_id');
			$table->integer('accint_id'); //Una sola tabla de accesorios
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
		Schema::drop('l_accint_module_relation_table');
	}

}