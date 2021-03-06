<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	
		Schema::create('l_user_table', function($table){
			$table->increments('id');
			$table->string('username');
			$table->string('password');
			$table->timestamps();
		});

		DB::table('l_user_table')->insert(array(
			'username' => 'admin',
			'password' => Hash::make('admin'),
			'updated_at' => date('y-m-d H:m:s')
		));
		DB::table('l_user_table')->insert(array(
			'username' => 'dani',
			'password' => Hash::make('dani'),
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
		Schema::drop('l_user_table');
	}

}