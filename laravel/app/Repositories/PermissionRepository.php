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

    public function getAll(?int $limit = null): ResourceCollection
    {
        return new PermissionCollection(parent::getAll($limit));
    }

    public function getAllTrashed(?int $limit = null): ResourceCollection
    {
        return new PermissionCollection(parent::getAllTrashed($limit));
    }

    public function findFirst(string $value, ?array $option = [], ?array $columns = ['*'], ?string $condition = 'id'): PermissionResource
    {
        return new PermissionResource(parent::findFirst($value, $option, $columns, $condition));
    }

    public function findOnlyTrashedById(int $id): PermissionResource
    {
        return new PermissionResource(parent::findOnlyTrashedById($id));
    }

    public function findWithTrashedById(int $id): PermissionResource
    {
        return new PermissionResource(parent::findWithTrashedById($id));
    }
}
