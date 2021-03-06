<?php

namespace VulpeProject\Entities\Projects;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjectNote extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    	'project_id',
    	'title',
    	'note'
    ];
    
    public function project()
    {
    	$this->belongsTo(Project::class);
    }
}
