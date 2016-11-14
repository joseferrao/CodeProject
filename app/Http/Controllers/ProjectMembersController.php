<?php

namespace VulpeProject\Http\Controllers;

use VulpeProject\Contracts\Projects\ProjectMemberRepository;
use VulpeProject\Validators\Projects\ProjectMemberValidator;


class ProjectMembersController extends Controller
{

    /**
     * @var ProjectMemberRepository
     */
    protected $repository;

    /**
     * @var ProjectMemberValidator
     */
    protected $validator;


    public function __construct(ProjectMemberRepository $repository, ProjectMemberValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        return $this->repository->findWhere(['project_id' => $id]);

    }
}
