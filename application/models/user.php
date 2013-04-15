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
		return $this->has_many_and_belongs_to('Role');
	}
}