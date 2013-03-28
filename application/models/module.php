<?php

class Module extends Eloquent 
{
	public static $table = 'l_modules_table';

    public function accints()
    {
        return $this->has_many_and_belongs_to('accint', 'l_accint_module_relation_table');
    }
}