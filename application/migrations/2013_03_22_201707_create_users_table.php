<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	
		Schema::create('user_table', function($table){
			$table->increments('id');
			$table->string('username');
			$table->string('password');
			$table->string('type_user');
			$table->timestamps();
		});

		DB::table('user_table')->insert(array(
			'username' => 'admin',
			'password' => Hash::make('admin'),
			'type_user' => 1,
			'updated_at' => date('y-m-d H:m:s')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_table');
	}

}