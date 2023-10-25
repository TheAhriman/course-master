<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PermissionService extends BaseService
{
    /**
     * @param PermissionRepositoryInterface $repository
     */
    public function __construct(PermissionRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
