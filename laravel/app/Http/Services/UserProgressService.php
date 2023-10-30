<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\UserProgressRepositoryInterface;

class UserProgressService extends BaseService
{
    /**
     * @param UserProgressRepositoryInterface $repository
     */
    public function __construct(UserProgressRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
