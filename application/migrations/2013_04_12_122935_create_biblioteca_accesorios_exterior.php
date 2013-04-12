<?php

class Create_Biblioteca_Accesorios_Exterior {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('l_biblioteca_accesorios_exterior', function($table){
			$table->increments('id');
			$table->string('desc');
			$table->string('points');
			$table->integer('type');
			$table->integer('proveedor');
			$table->string('ref');
			$table->string('img');
			$table->timestamps();
		});

		$b_acc_ext = array(
		  array('id' => '1','desc' => 'Colunmas','points' => '150','type' => '1','proveedor' => '0','ref' => '','img' => ''),
		  array('id' => '2','desc' => 'Vigas','points' => '69','type' => '1','proveedor' => '0','ref' => '','img' => ''),
		  array('id' => '3','desc' => 'Interior en L esquina libre','points' => '130','type' => '1','proveedor' => '0','ref' => '','img' => ''),
		  array('id' => '4','desc' => 'Interior en L esquina con costado','points' => '80','type' => '1','proveedor' => '0','ref' => '','img' => ''),
		  array('id' => '5','desc' => 'Chaflán','points' => '90','type' => '1','proveedor' => '0','ref' => '','img' => ''),
		  array('id' => '6','desc' => 'Costado visto','points' => '0','type' => '1','proveedor' => '0','ref' => '','img' => '')
		);

		foreach ($b_acc_ext as $acc) {
			DB::table('l_biblioteca_accesorios_exterior')->insert(array(
				'id' => $acc["id"],
				'desc' => $acc["desc"],
				'points' => $acc["points"],
				'type' => $acc["type"],
				'proveedor' => $acc["proveedor"],
				'ref' => $acc["ref"],
				'img' => $acc["img"],
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
		Schema::drop('l_biblioteca_accesorios_exterior');
	}

}