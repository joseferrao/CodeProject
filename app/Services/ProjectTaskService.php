<?php 

namespace VulpeProject\Services;

use VulpeProject\Contracts\Projects\ProjectTaskRepository;
use VulpeProject\Validators\Projects\ProjectTaskValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ProjectTaskService
{
	/**
     * @var ProjectTaskRepository
     */
    protected $repository;

    /**
     * @var ProjectTaskValidator
     */
    protected $validator;

    public function __construct(ProjectTaskRepository $repository, ProjectTaskValidator $validator){
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    public function find($id, $taskID)
    {
        try {

            return $this->repository->findWhere(['project_id' => $id, 'id' => $taskID]);

        } catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => 'Tarefa não encontrada.'
            ];
         } catch (QueryException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => 'Houve algum erro na busca da tarefa'
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
                'message' => 'Ocorreu algum erro ao criar a tarefa.'
            ];
    	}
	}



	public function update($id, array $data)
	{
		try {
			$this->validator->with($data)->passesOrFail();
			return $this->repository->update($data, $id);

		} catch (ValidatorException $e){
			return [
				'error' => true,
				'message' => $e->getMessageBag()
			];
		} catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => 'Tarefa não encontrado.'
            ];
	    } catch (QueryException $e) {
            return [
                'error' => true,
                'message' => 'Erro ao executar o comando de atualização.'
            ];
        } catch (\Exception $e) {
	        return [
	            'error' => true,
	            'message' => 'Ocorreu algum erro ao atualizar a tarefa.'
	        ];
	    }
	}

	public function delete($id)
    {
        try {
            $this->repository->find($id)->delete();
            return [
                'success'=>true,
                'message' =>	'Tarefa excluída com sucesso!'
            ];
        } catch (ModelNotFoundException $e) {
            return [
                'error'=>true,
                'message' => 'Tarefa não encontrado.'
            ];
        } catch (QueryException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        } catch (\Exception $e) {
            return [
                'error'=>true,
                'message' => 'Ocorreu algum erro ao excluir a tarefa.'
            ];
        }
    }

}
