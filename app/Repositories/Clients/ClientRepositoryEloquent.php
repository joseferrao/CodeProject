<?php

namespace VulpeProject\Repositories\Clients;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use VulpeProject\Contracts\Clients\ClientRepository;
use VulpeProject\Entities\Clients\Client;
use VulpeProject\Validators\Clients\ClientValidator;

/**
 * Class ClientRepositoryEloquent
 * @package namespace VulpeProject\Repositories\Clients;
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
