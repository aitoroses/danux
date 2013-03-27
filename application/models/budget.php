<?php

class Budget extends Eloquent 
{
	public static $table = 'l_budget_table';

	public function wardrobe()
    {
          return $this->has_many('wardrobe');
    }

    
}