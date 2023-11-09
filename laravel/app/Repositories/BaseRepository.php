<?php

namespace App\Repositories;

use App\Enums\RepositoryParamEnum;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\LaravelData\Data;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var array
     */
    protected array $params = [];

    /**
     * @param Model $model
     */
    public function __construct(protected Model $model)
    {
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return $this
     */
    public function __call(string $name, array $arguments)
    {
        if (($method = RepositoryParamEnum::tryFrom($name)) !== null) {
            $this->setParam($method->value, ...$arguments);
        }

        return $this;
    }

    /**
     * @return Builder
     */
    protected function newQuery(): Builder
    {
        return $this->applyQueryParams(
            $this->model::query()
        );
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    protected function applyQueryParams(Builder $query): Builder
    {
        foreach ($this->params as $param){
            is_array($param)
                ? $query->{array_search($param,$this->params)}(...$param)
                : $query->{array_search($param,$this->params)}($param);
        }

        return $query;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    protected function setParam(string $key, mixed $value): void
    {
        $this->params[$key] = $value;
    }

    /**
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->newQuery()->get();
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @param string $pageName
     * @param int|null $page
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage = 15, array $columns = ['*'], string $pageName = 'page', ?int $page = null): LengthAwarePaginator
    {
        return $this->newQuery()->paginate($perPage, $columns, $pageName, $page);
    }

    /**
     * @param mixed $value
     * @param string|null $column
     * @return JsonResource
     */
    public function first(mixed $value, ?string $column = 'id'): JsonResource
    {
        $qb = $this->newQuery();

        return is_array($value)
            ? new JsonResource($qb->where($value)->first())
            : new JsonResource($qb->where($column, '=', $value)->first());
    }

    /**
     * @param array $fillable
     * @param string $orderField
     * @param string $orderType
     * @return Collection
     */
    public function where(array $fillable, string $orderField = 'id', string $orderType = 'asc'): Collection
    {
        return $this->newQuery()->where($fillable)
            ->orderBy($orderField, $orderType)
            ->get();
    }

    /**
     * @param Data $data
     * @return JsonResource
     */
    public function create(Data $data): JsonResource
    {
        return new JsonResource($this->model->query()->create($data->toArray()));
    }

    /**
     * @param int $id
     * @param Data $data
     * @return void
     */
    public function updateById(int $id, Data $data): void
    {
        $this->newQuery()->find($id)->update(($data->toArray()));
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void
    {
        $this->model::destroy($id);
    }

    /**
     * @param int $id
     * @return void
     */
    public function restoreById(int $id): void
    {
        $this->model->onlyTrashed()->find($id)->restore();
    }
}
