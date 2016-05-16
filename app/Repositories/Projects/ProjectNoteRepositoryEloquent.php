<?php

namespace VulpeProject\Repositories\Projects;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use VulpeProject\Contracts\Projects\ProjectNoteRepository;
use VulpeProject\Entities\Projects\ProjectNote;
use VulpeProject\Validators\Projects\ProjectNoteValidator;

/**
 * Class ProjectNoteRepositoryEloquent
 * @package namespace VulpeProject\Repositories\Projects;
 */
class ProjectNoteRepositoryEloquent extends BaseRepository implements ProjectNoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectNote::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProjectNoteValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
