<?php

namespace App\Repositories;

use App\Http\Resources\ExaminationCollection;
use App\Http\Resources\ExaminationResource;
use App\Models\Examination;
use App\Repositories\Interfaces\ExaminationRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Js;

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
