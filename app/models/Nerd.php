<?php

	class Nerd extends Eloquent
	{
             protected $guarded = array('id');    
            public static $rules = array(
			'name'       => 'required',
			'email'      => 'required|email',
			'nerd_level' => 'required|numeric'
		);      
        }