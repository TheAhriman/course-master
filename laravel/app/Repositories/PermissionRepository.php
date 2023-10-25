<?php

namespace App\Repositories;

use App\Http\Resources\PermissionCollection;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    /**
     * @param Permission $permission
     */
    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
    }
}
