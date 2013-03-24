<?php

class Door extends Eloquent 
{
	public static $table = 'l_doors_table';

	public function materials()
    {
        return $this->has_many_and_belongs_to('DoorMaterial', 'l_door_material_relation_table');
    }
}