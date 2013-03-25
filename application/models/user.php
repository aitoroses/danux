<?php

class User extends Eloquent 
{
	public static $table = "user_table";

	public function budgets()
    {
          return $this->has_many('budget');
    }
}