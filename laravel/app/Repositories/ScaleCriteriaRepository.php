<?php

namespace App\Repositories;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\ScaleCriteria;
use App\Models\User;
use App\Repositories\Interfaces\ScaleCriteriaRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Js;

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
