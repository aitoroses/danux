<?php

class Budget extends Eloquent 
{
	public static $table = 'budget_table';

	public function wardrobe()
    {
          return $this->has_one('wardrobe');
    }

    
}