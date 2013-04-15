<?php

class Create_Roles_Table {    

	public function up()
    {
		Schema::create('l_roles_table', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		DB::table('l_roles_table')->insert(array(
				'name' => 'admin',
				'created_at' => date('y-m-d H:m:s'),
				'updated_at' => date('y-m-d H:m:s')
		));
		DB::table('l_roles_table')->insert(array(
				'name' => 'tienda',
				'created_at' => date('y-m-d H:m:s'),
				'updated_at' => date('y-m-d H:m:s')
		));
		DB::table('l_roles_table')->insert(array(
				'name' => 'usuario',
				'created_at' => date('y-m-d H:m:s'),
				'updated_at' => date('y-m-d H:m:s')
		));

    }    

	public function down()
    {
		Schema::drop('l_roles_table');

    }

}