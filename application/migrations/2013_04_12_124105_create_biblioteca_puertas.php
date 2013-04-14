<?php

class Create_Biblioteca_Puertas {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('l_biblioteca_puertas', function($table){
			$table->increments('id');
			$table->string('desc');
			$table->string('image');
			$table->integer('div');
			$table->timestamps();
		});

		$b_doors = array(
		  array('id' => '1','desc' => '1','image' => 'contenido/Bibliotecas/puertas','div' => '1'),
		  array('id' => '2','desc' => '2,2','image' => 'contenido/Bibliotecas/puertas','div' => '2'),
		  array('id' => '3','desc' => '3,3,3','image' => 'contenido/Bibliotecas/puertas','div' => '3'),
		  array('id' => '4','desc' => '4,4,4,4','image' => 'contenido/Bibliotecas/puertas','div' => '4'),
		  array('id' => '5','desc' => '6,12,2,12,6','image' => 'contenido/Bibliotecas/puertas','div' => '5'),
		  array('id' => '6','desc' => '7/12,12,3','image' => 'contenido/Bibliotecas/puertas','div' => '3'),
		  array('id' => '7','desc' => '5/12,6,5/12','image' => 'contenido/Bibliotecas/puertas','div' => '3')
		);

		foreach ($b_doors as $door) {
			DB::table('l_biblioteca_puertas')->insert(array(
				'id' => $door["id"],
				'desc' => $door["desc"],
				'image' => $door["image"],
				'div' => $door["div"],
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
		Schema::drop('l_biblioteca_puertas');
	}

}