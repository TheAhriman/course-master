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

    public function getAll(?int $limit = null): ResourceCollection
    {
        return new RoleCollection(parent::getAll($limit));
    }

    public function getAllTrashed(?int $limit = null): ResourceCollection
    {
        return new RoleCollection(parent::getAllTrashed($limit));
    }

    public function findById(string $value, ?array $option = [], ?array $columns = ['*'], ?string $condition = 'id'): RoleResource
    {
        return new RoleResource(parent::findById($value, $option, $columns, $condition));
    }

    public function findOnlyTrashedById(int $id): RoleResource
    {
        return new RoleResource(parent::findOnlyTrashedById($id));
    }

    public function findWithTrashedById(int $id): RoleResource
    {
        return new RoleResource(parent::findWithTrashedById($id));
    }
}
