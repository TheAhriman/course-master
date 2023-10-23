<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\UserAnswerRepositoryInterface;

class UserAnswerService extends BaseService
{
    /**
     * @param UserAnswerRepositoryInterface $repository
     */
    public function __construct(UserAnswerRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
