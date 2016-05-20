<?php

namespace VulpeProject\Repositories\Projects;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use VulpeProject\Contracts\Projects\ProjectTaskRepository;
use VulpeProject\Entities\Projects\ProjectTask;
use VulpeProject\Validators\Projects\ProjectTaskValidator;

/**
 * Class ProjectTaskRepositoryEloquent
 * @package namespace VulpeProject\Repositories\Projects;
 */
class ProjectTaskRepositoryEloquent extends BaseRepository implements ProjectTaskRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectTask::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProjectTaskValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
