<?php

namespace VulpeProject\Entities\Projects;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use VulpeProject\Entities\Clients\Client;
use VulpeProject\Entities\User;

class Project extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id',
        'client_id',
    	'name',
    	'description',
    	'progress',
    	'status',
    	'due_date'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function notes()
    {
        return $this->hasMany(ProjectNote::class);
    }

    public function members()
    {
        return return $this->belongsToMany(User::class, 'project_members', 'project_id', 'member_id');
    }

}
