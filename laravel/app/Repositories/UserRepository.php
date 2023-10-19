<?php

namespace App\Repositories;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Js;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getAll(?int $limit = null): ResourceCollection
    {
        return new UserCollection(parent::getAll($limit));
    }

    public function getAllTrashed(?int $limit = null): ResourceCollection
    {
        return new UserCollection(parent::getAllTrashed($limit));
    }

    public function findById(string $value, ?array $option = [], ?array $columns = ['*'], ?string $condition = 'id'): JsonResource
    {
        return new UserResource(parent::findById($value, $option, $columns, $condition));
    }

    public function findOnlyTrashedById(int $id): JsonResource
    {
        return new UserResource(parent::findOnlyTrashedById($id));
    }

    public function findWithTrashedById(int $id): JsonResource
    {
        return new UserResource(parent::findWithTrashedById($id));
    }
}
