<?php

class Door extends Eloquent 
{
	public static $table = 'l_doors_table';

	public function material()
    {
        return $this->has_many('materials_door');
    }
}