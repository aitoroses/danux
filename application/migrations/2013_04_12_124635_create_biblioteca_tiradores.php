<?php

class Create_Biblioteca_Tiradores {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('l_biblioteca_tiradores', function($table){
			$table->increments('id');
			$table->string('tiradores');
			$table->string('codigo');
			$table->string('material');
			$table->string('largura');
			$table->string('desc');
			$table->string('precio');
			$table->string('img');
			$table->timestamps();
		});

		$b_handles = array(
		  array('id' => '1','Tiradores' => 'Tipo 1','Codigo' => '1456-96-010','Material' => 'Metal','Largura' => '105','Desc' => 'Cromo Brillo','Precio' => '10','img' => 'Tira1.jpg'),
		  array('id' => '2','Tiradores' => 'Tipo 1','Codigo' => '1456-96-011','Material' => 'Metal','Largura' => '105','Desc' => 'Cromo Mate','Precio' => '10','img' => 'Tira1.jpg'),
		  array('id' => '3','Tiradores' => 'Tipo 2','Codigo' => '9391-046','Material' => 'Madera','Largura' => '240','Desc' => 'Negro','Precio' => '10','img' => 'Tira2.jpg'),
		  array('id' => '4','Tiradores' => 'Tipo 2','Codigo' => '9391-047','Material' => 'Madera','Largura' => '240','Desc' => 'Marron','Precio' => '10','img' => 'Tira2.jpg'),
		  array('id' => '5','Tiradores' => 'Tipo 3','Codigo' => '9390-046','Material' => 'Madera','Largura' => '55','Desc' => 'Negro','Precio' => '10','img' => 'Tira3.jpg'),
		  array('id' => '6','Tiradores' => 'Tipo 3','Codigo' => '9390-047','Material' => 'Madera','Largura' => '55','Desc' => 'Marron','Precio' => '10','img' => 'Tira3.jpg'),
		  array('id' => '7','Tiradores' => 'Tipo 4','Codigo' => '621-C-011','Material' => 'Metal','Largura' => '18','Desc' => 'Cromo Mate','Precio' => '10','img' => 'Tira4.jpg'),
		  array('id' => '8','Tiradores' => 'Tipo 5','Codigo' => '1428-160-011','Material' => 'Metal','Largura' => '196','Desc' => 'Cromo Mate','Precio' => '10','img' => 'Tira5.jpg'),
		  array('id' => '9','Tiradores' => 'Tipo 5','Codigo' => '1428-224-011','Material' => 'Metal','Largura' => '259','Desc' => 'Cromo Mate','Precio' => '10','img' => 'Tira5.jpg'),
		  array('id' => '10','Tiradores' => 'Tipo 6','Codigo' => '1447-224-011','Material' => 'Metal','Largura' => '244','Desc' => 'Cromo Mate','Precio' => '10','img' => 'Tira6.jpg'),
		  array('id' => '11','Tiradores' => 'Tipo 6','Codigo' => '1447-224-051','Material' => 'Metal','Largura' => '244','Desc' => 'Pintura Negro Mate','Precio' => '10','img' => 'Tira6.jpg'),
		  array('id' => '12','Tiradores' => 'Tipo 6','Codigo' => '1447-224-010','Material' => 'Metal','Largura' => '244','Desc' => 'Cromo Brillo','Precio' => '10','img' => 'Tira6.jpg'),
		  array('id' => '13','Tiradores' => 'Tipo 7','Codigo' => '1455-32-011','Material' => 'Metal','Largura' => '50','Desc' => 'Cromo Mate','Precio' => '10','img' => 'Tira7.jpg'),
		  array('id' => '14','Tiradores' => 'Tipo 8','Codigo' => '1403-320-AL15-PE','Material' => 'Metal','Largura' => '336','Desc' => 'Cromo Mate','Precio' => '336','img' => 'Tira8.jpg'),
		  array('id' => '15','Tiradores' => 'Tipo 8','Codigo' => '1403-320-AL15-PE','Material' => 'Metal','Largura' => '624','Desc' => 'Cromo Mate','Precio' => '624','img' => 'Tira8.jpg'),
		  array('id' => '16','Tiradores' => 'Tipo 8','Codigo' => '1403-320-AL15-PE','Material' => 'Metal','Largura' => '100','Desc' => 'Cromo Mate','Precio' => '1008','img' => 'Tira8.jpg'),
		  array('id' => '17','Tiradores' => 'Tipo 9','Codigo' => '1386-160-030MATT','Material' => 'Metal','Largura' => '207','Desc' => 'Bronce Mate','Precio' => '10','img' => 'Tira9.jpg'),
		  array('id' => '18','Tiradores' => 'Tipo 10','Codigo' => '1375-192-010','Material' => 'Metal','Largura' => '220','Desc' => 'Cromo Brillo','Precio' => '10','img' => 'Tira10.jpg'),
		  array('id' => '19','Tiradores' => 'Tipo 10','Codigo' => '1377-160-L83','Material' => 'Metal','Largura' => '192','Desc' => 'Haya S/B','Precio' => '10','img' => 'Tira10.jpg'),
		  array('id' => '20','Tiradores' => 'Tipo 11','Codigo' => '1434-192-0147','Material' => 'Metal','Largura' => '236','Desc' => 'Niquel Marron Mate','Precio' => '10','img' => 'Tira11.jpg'),
		  array('id' => '21','Tiradores' => 'Tipo 12','Codigo' => '601-B-011','Material' => 'Metal','Largura' => '','Desc' => 'Cromo Mate','Precio' => '10','img' => 'Tira12.jpg')
		);


		foreach ($b_handles as $handle) {
			DB::table('l_biblioteca_tiradores')->insert(array(
				'id' => $handle["id"],
				'tiradores' => $handle["Tiradores"],
				'codigo' => $handle["Codigo"],
				'material' => $handle["Material"],
				'largura' => $handle["Largura"],
				'desc' => $handle["Desc"],
				'precio' => $handle["Precio"],
				'img' => $handle["img"],
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
		Schema::drop('l_biblioteca_tiradores');
	}

}