<?php
class Role extends Eloquent {

	public static $timestamps = true;
	public static $table = "l_roles_table";

	public function users()
	{
		return $this->has_many_and_belongs_to('User','l_user_roles_relation_table');
	}
}