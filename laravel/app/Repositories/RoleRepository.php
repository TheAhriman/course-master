<?php

namespace App\Repositories;

use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }
}
