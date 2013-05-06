<?php

class User extends Eloquent 
{
	public static $table = "l_user_table";

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