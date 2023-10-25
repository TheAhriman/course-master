<?php

namespace App\Repositories;

use App\Models\QuestionGroup;
use App\Repositories\Interfaces\QuestionGroupRepositoryInterface;
class QuestionGroupRepository extends BaseRepository implements QuestionGroupRepositoryInterface
{
    /**
     * @param QuestionGroup $questionGroup
     */
    public function __construct(QuestionGroup $questionGroup)
    {
        parent::__construct($questionGroup);
    }
}
