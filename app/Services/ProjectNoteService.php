<?php 

namespace VulpeProject\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use VulpeProject\Contracts\Projects\ProjectNoteRepository;
use VulpeProject\Validators\Projects\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

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

  public function find($id, $noteID)
  {
  	try {
  			return $this->repository->findWhere(['project_id' => $id, 'id' => $noteID]);
  	} catch (ModelNotFoundException $e) {
        return [
            'error' => true,
            'message' => 'Anotação não encontrada.'
        ];            
   	 } 
  }

	public function create(array $data)
	{
		try {
				$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
	      return $this->repository->create($data);
		} catch (ValidatorException $e){
			return [
				'error' => true,
				'message' => $e->getMessageBag()
			];
		} catch (QueryException $e){
		    return $e->getMessage();
        }  catch (\Exception $e) {
                return [
                    'error' => true,
                    'message' => 'Ocorreu algum erro ao criar a anotação.'
                ];
            }
	}

	public function update(array $data, $id)
	{
		try {

			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
			return $this->repository->update($data, $id);

		} catch (ValidatorException $e){
			return [
				'error' => true,
				'message' => $e->getMessageBag()
			];
		}	catch (ModelNotFoundException $e) {
        return [
            'error' => true,
            'message' => 'Anotação não encontrado.'
        ];            
	    } catch (\Exception $e) {
	        return [
	            'error' => true,
	            'message' => 'Ocorreu algum erro ao atualizar a anotação'
	        ];
	    	}	
	}

	public function delete($id)
  {
    try {
        $this->repository->find($id)->delete();
        return [
        	'success'=>true, 
        	'message' =>	'Anotação excluída com sucesso!'
        ];
    } catch (ModelNotFoundException $e) {
	        return [
	        	'error'=>true,
	        	'message' => 'Anotação não encontrado.'
	        ];
	    	} catch (\Exception $e) {
	        return [
	        	'error'=>true,
	        	'message' => 'Ocorreu algum erro ao excluir a anotação.'
	        ];
	    	}
  }
}
