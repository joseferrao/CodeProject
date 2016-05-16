<?php 

namespace VulpeProject\Services;

use VulpeProject\Contracts\Projects\ProjectNoteRepository;
use VulpeProject\Validators\Projects\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectNoteService
{
	/**
     * @var ProjectNoteRepository
     */
    protected $repository;

    /**
     * @var ProjectNoteValidator
     */
    protected $validator;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator){
        $this->repository = $repository;
        $this->validator  = $validator;
    }


	public function create(array $data)
	{
		try {
				$this->validator->with($data)->passesOrFail();
	            return $this->repository->create($data);

		} catch (ValidatorException $e){
			return [
				'error' => true,
				'message' => $e->getMessageBag()
			];
		}
	}

	public function update(array $data, $id)
	{
		try {

			$this->validator->with($data)->passesOrFail();
			return $this->repository->update($data, $id);

		} catch (ValidatorException $e){
			return [
				'error' => true,
				'message' => $e->getMessageBag()
			];
		}		
	}
}
