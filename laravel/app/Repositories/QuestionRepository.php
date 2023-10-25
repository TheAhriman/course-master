<?php

namespace App\Repositories;

use App\Models\Question;
use App\Repositories\Interfaces\QuestionRepositoryInterface;

class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{
    /**
     * @param Question $question
     */
    public function __construct(Question $question)
    {
        parent::__construct($question);
    }
}
