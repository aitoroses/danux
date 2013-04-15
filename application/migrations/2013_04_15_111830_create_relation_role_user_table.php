<?php

class Create_Relation_Role_User_Table {    

	public function up()
    {
		Schema::create('l_user_roles_relation_table', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('role_id');
			$table->timestamps();

		});
		DB::table('l_user_roles_relation_table')->insert(array(
				'user_id' => 1,
				'role_id' => 1,
				'created_at' => date('y-m-d H:m:s'),
				'updated_at' => date('y-m-d H:m:s')
		));

    }    

	public function down()
    {
		Schema::drop('l_user_roles_relation_table');

    }

}