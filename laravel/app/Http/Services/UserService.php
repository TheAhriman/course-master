<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService extends BaseService
{
    /**
     * @param UserRepositoryInterface $repository
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
