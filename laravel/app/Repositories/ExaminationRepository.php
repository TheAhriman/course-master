<?php

namespace App\Repositories;

use App\Models\Examination;
use App\Repositories\Interfaces\ExaminationRepositoryInterface;

class ExaminationRepository extends BaseRepository implements ExaminationRepositoryInterface
{
    /**
     * @param Examination $examination
     */
    public function __construct(Examination $examination)
    {
        parent::__construct($examination);
    }
}
