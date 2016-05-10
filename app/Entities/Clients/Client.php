<?php

namespace VulpeProject\Entities\Clients;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name', 
    	'responsible', 
    	'email', 
    	'phone', 
    	'address', 
    	'obs'
    ];

}
