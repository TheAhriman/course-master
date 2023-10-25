<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\QuestionRepositoryInterface;

class QuestionService extends BaseService
{
    /**
     * @param QuestionRepositoryInterface $repository
     */
    public function __construct(QuestionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
