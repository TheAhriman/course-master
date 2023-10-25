<?php

namespace App\Repositories;

use App\Models\QuestionResponse;
use App\Repositories\Interfaces\QuestionResponseRepositoryInterface;

class QuestionResponseRepository extends BaseRepository implements QuestionResponseRepositoryInterface
{
    /**
     * @param QuestionResponse $questionResponse
     */
    public function __construct(QuestionResponse $questionResponse)
    {
        parent::__construct($questionResponse);
    }
}
