<?php

class Wardrobe extends Eloquent 
{
	public static $table = 'wardrobe_table';

    public static $rules = array(
        'name' => 'required|min:3|alpha_num',
        'width' => 'required|numeric|min:500|max:5000',
        'height' => 'required|numeric|min:500|max:2500',
        'prof' => 'required|numeric|min:500|max:1500',
        'typedoor' => 'required|in:0,1,2'
    );

    
    public static function validate($data){
        return Validator::make($data, static::$rules);
    }

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