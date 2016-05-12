<?php

namespace VulpeProject\Validators\Clients;

//use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator {

	protected $rules = [
	        'name' => 'required|max:255',
	        'responsible' => 'required|max:255',
	        'email' => 'required|email',
	        'phone' => 'required',
	        'address' => 'required'
    ];
	/*
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
	        'name' => 'required|max:255',
	        'responsible' => 'required|max:255',
	        'email' => 'required|email',
	        'phone' => 'required',
	        'address' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
	        'name' => 'required|max:255',
	        'responsible' => 'required|max:255',
	        'email' => 'required|email',
	        'phone' => 'required',
	        'address' => 'required'
        ],

   ];
   */

}