<?php

namespace VulpeProject\Repositories\Projects;

use Prettus\Repository\Eloquent\BaseRepository;
use VulpeProject\Contracts\Projects\ProjectRepository;
use VulpeProject\Entities\Projects\Project;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace VulpeProject\Repositories\Projects;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }
}
