<?php

class User extends Eloquent 
{
	public static $table = "l_user_table";

	public static $rules = array(
	    'username'  => 'required|unique:l_user_table|between:5,12',
	    'password' => 'required|between:4,8'
	);

	public static $messages = array(
		'required' => "Se requiere el campo :attribute.",
		'unique' => "El nombre de usuario ya existe.",
		'between' => "El campo :attribute puede tener como máximo :max caractéres y como mínimo :min."

	);

	public static function validate($input) {
        return $validation = Validator::make($input, static::$rules, static::$messages);
	}

	public function budgets()
    {
          return $this->has_many('budget');
    }
    public function roles()
	{
		return $this->has_many_and_belongs_to('Role','l_user_roles_relation_table');
	}
	public function set_password($password)
	{
		$this->set_attribute('password', Hash::make($password));
	}



}