<?php 

namespace VulpeProject\Services;

use VulpeProject\Contracts\Projects\ProjectRepository;
use VulpeProject\Validators\Projects\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ProjectService
{
	/**
     * @var ProjectRepository
     */
    protected $repository;

    /**
     * @var ProjectValidator
     */
    protected $validator;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator){
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function find($id)
    {
        try {
            return $this->repository->with(['owner','client'])->find($id);
        } catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => 'Projeto não encontrado.'
            ];
        }
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
		} catch (\Exception $e) {
        return [
            'error' => true,
            'message' => 'Ocorreu algum erro ao criar o projeto.'
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
			}	catch (ModelNotFoundException $e) {
	        return [
	            'error' => true,
	            'message' => 'Projeto não encontrado.'
	        ];            
		    } catch (\Exception $e) {
		        return [
		            'error' => true,
		            'message' => 'Ocorreu algum erro ao atualizar o projeto.'
		        ];
		    	}	
	}

	public function destroy($id)
    {
        try {
            $this->repository->find($id)->delete();
            return [
                'success'=>true,
                'message' =>	'Projeto deletado com sucesso!'
            ];
        } catch (QueryException $e) {
            return [
                'error'=>true,
                'message' => 'Projeto não pode ser apagado pois existe um ou mais clientes vinculados a ele.'
            ];
        } catch (ModelNotFoundException $e) {
            return [
                'error'=>true,
                'message' => 'Projeto não encontrado.'
            ];
        } catch (\Exception $e) {
            return [
                'error'=>true,
                'message' => 'Ocorreu algum erro ao excluir o projeto.'
            ];
        }
    }

    public function addMember($project, array $data)
    {
        //
    }

    public function removeMember($id)
    {
        //
    }

    /**
     * @param $project
     * @param $id
     */
    public function isMember($project, $id)
    {
        $this->repository->with('members')->find($project);
    }
}
