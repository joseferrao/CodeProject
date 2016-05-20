<?php 

namespace VulpeProject\Services;

use VulpeProject\Contracts\Clients\ClientRepository;
use VulpeProject\Validators\Clients\ClientValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{
	/**
     * @var ClientRepository
     */
    protected $repository;

    /**
     * @var ClientValidator
     */
    protected $validator;

    public function __construct(ClientRepository $repository, ClientValidator $validator){
        $this->repository = $repository;
        $this->validator  = $validator;
    }



  public function find($id)
  {
  	try {
  			return $this->repository->find($id);
  	} catch (ModelNotFoundException $e) {
        return [
            'error' => true,
            'message' => 'Cliente não encontrado.'
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
	            'message' => 'Ocorreu algum erro ao criar o cliente.'
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
			} catch (ModelNotFoundException $e) {
	        return [
	            'error' => true,
	            'message' => 'Cliente não encontrado.'
	        ];            
	    	} catch (\Exception $e) {
	        return [
	            'error' => true,
	            'message' => 'Ocorreu algum erro ao atualizar o cliente.'
	        ];
	    	}		
	}

  public function delete($id)
  {
    try {
      $this->repository->find($id)->delete();
      return [
      	'success'=>true,
      	'message'	=> 'Cliente deletado com sucesso!'];
    } catch (QueryException $e) {
	      return [
	      	'error'=>true, 
	      	'message'	=>	'Cliente não pode ser apagado pois existe um ou mais projetos vinculados a ele.'];
    } catch (ModelNotFoundException $e) {
        return [
        	'error'		=>	true, 
        	'message' => 'Cliente não encontrado.'];
    } catch (\Exception $e) {
        return [
        	'error'	=>	true, 
        	'message'	=>	'Ocorreu algum erro ao excluir o cliente.'];
    }
  }	
}
