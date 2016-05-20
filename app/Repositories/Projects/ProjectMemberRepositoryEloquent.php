<?php

namespace VulpeProject\Repositories\Projects;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use VulpeProject\Contracts\Projects\ProjectMemberRepository;
use VulpeProject\Entities\Projects\ProjectMember;
use VulpeProject\Validators\Projects\ProjectMemberValidator;

/**
 * Class ProjectMemberRepositoryEloquent
 * @package namespace VulpeProject\Repositories\Projects;
 */
class ProjectMemberRepositoryEloquent extends BaseRepository implements ProjectMemberRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectMember::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProjectMemberValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
