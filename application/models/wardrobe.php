<?php

class Wardrobe extends Eloquent 
{
	public static $table = 'wardrobe_table';

	public function modules()
    {
        return $this->has_many('module');
    }

    public function doors()
    {
        return $this->has_many('door');
    }

    public function accints()
    {
        return $this->has_many('accint');
    }

    public function accexts()
    {
        return $this->has_many('accext');
    }

}