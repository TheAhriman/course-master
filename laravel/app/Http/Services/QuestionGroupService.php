<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\QuestionGroupRepositoryInterface;

class QuestionGroupService extends BaseService
{
    /**
     * @param QuestionGroupRepositoryInterface $repository
     */
    public function __construct(QuestionGroupRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
