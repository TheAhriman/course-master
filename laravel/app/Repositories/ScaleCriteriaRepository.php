<?php

namespace App\Repositories;

use App\Models\ScaleCriteria;
use App\Repositories\Interfaces\ScaleCriteriaRepositoryInterface;

class ScaleCriteriaRepository extends BaseRepository implements ScaleCriteriaRepositoryInterface
{
    /**
     * @param ScaleCriteria $scaleCriteria
     */
    public function __construct(ScaleCriteria $scaleCriteria)
    {
        parent::__construct($scaleCriteria);
    }
}
