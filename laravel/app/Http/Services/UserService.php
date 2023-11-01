<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserService extends BaseService
{
    /**
     * @param UserRepositoryInterface $repository
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

	/**
	 * @return Collection
	 */
    public function getAllCreators(): Collection
    {
        return $this->repository->where(['role_id' => 1]);
    }

}
