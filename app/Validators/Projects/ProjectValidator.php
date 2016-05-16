<?php

namespace VulpeProject\Validators\Projects;

use \Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator {

    protected $rules = [
    	'owner_id'		=> 	'required|integer',
    	'clients_id'	=>	'required|integer',
        'name'			=>	'required|max:255',
		'description'	=>	'required',
		'status'		=>	'required',
		'progress'		=>	'required',
		'duo_date'		=>	'required'
   ];

}