<?php

class Create_Biblioteca_Modulos {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{	

		Schema::create('l_biblioteca_modulos', function($table){
			$table->increments('id');
			$table->float('width_max');
			$table->string('points');
			$table->string('image');
			$table->timestamps();
		});	

		$data = array(
		  array('id' => '1','width_max' => '2500','points' => '0','image' => 'contenido/Bibliotecas/modulos'),
		  array('id' => '2','width_max' => '2500','points' => '0','image' => 'contenido/Bibliotecas/modulos'),
		  array('id' => '3','width_max' => '2500','points' => '0','image' => 'contenido/Bibliotecas/modulos'),
		  array('id' => '4','width_max' => '2500','points' => '0','image' => 'contenido/Bibliotecas/modulos'),
		  array('id' => '5','width_max' => '2500','points' => '0','image' => 'contenido/Bibliotecas/modulos'),
		  array('id' => '6','width_max' => '2500','points' => '0','image' => 'contenido/Bibliotecas/modulos'),
		  array('id' => '7','width_max' => '2500','points' => '0','image' => 'contenido/Bibliotecas/modulos'),
		  array('id' => '8','width_max' => '2500','points' => '0','image' => 'contenido/Bibliotecas/modulos'),
		  array('id' => '9','width_max' => '2500','points' => '0','image' => 'contenido/Bibliotecas/modulos'),
		  array('id' => '10','width_max' => '2500','points' => '0','image' => 'contenido/Bibliotecas/modulos')
		);
		
		foreach ($data as $single) {
			DB::table('l_biblioteca_modulos')->insert(array(
				'id' => $single["id"],
				'width_max' => $single["width_max"],
				'points' => $single["points"],
				'image' => $single["image"],
				'created_at' => date('y-m-d H:m:s'),
				'updated_at' => date('y-m-d H:m:s')
			));
		}		


	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('l_biblioteca_modulos');
	}

}