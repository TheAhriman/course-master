<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\UserTakenExaminationRepositoryInterface;

class UserTakenExaminationService extends BaseService
{
    /**
     * @param UserTakenExaminationRepositoryInterface $repository
     */
    public function __construct(UserTakenExaminationRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
