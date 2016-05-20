<?php

namespace VulpeProject\Entities\Projects;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjectTask extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    	'project_id',
    	'name',
    	'start_date',
    	'due_date',
    	'status'
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
