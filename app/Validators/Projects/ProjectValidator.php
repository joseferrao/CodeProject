<?php

namespace VulpeProject\Validators\Projects;

use \Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator {

    protected $rules = [
        'name'			=>	'required|max:255',
		'description'	=>	'required'
   ];

}