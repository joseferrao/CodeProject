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

    /**
     * Relation on project table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
    	$this->belongsTo(Project::class);
    }
}
