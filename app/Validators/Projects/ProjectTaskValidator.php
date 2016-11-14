<?php

namespace VulpeProject\Validators\Projects;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProjectTaskValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'project_id' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'project_id' => 'required'
        ]
   ];

}