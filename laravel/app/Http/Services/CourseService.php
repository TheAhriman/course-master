<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\LaravelData\Data;

class CourseService extends BaseService
{
    /**
     * @param CourseRepositoryInterface $repository
     */
    public function __construct(CourseRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param Data $data
     * @return void
     */
    public function createCourseAndCategories(Data $data): void
    {
        $arrayData = $data->toArray();
        if (array_key_exists('category_id',$arrayData)){
            $categoriesIds = $arrayData['category_id'];
            unset($data['category_id']);
            $this->repository->create($data);
            $course = $this->repository->findLastCourse();
            $this->repository->syncCourseAndCategories($course, $categoriesIds);
        } else {
            $this->repository->create($data);
        }
    }

    /**
     * @param Data $data
     * @param string $id
     * @return void
     */
    public function updateCourseAndCategories(Data $data, string $id): void
    {
        $categoriesIds = [];
        if (array_key_exists('category_id',$data->toArray())){
            $categoriesIds = $data['category_id'];
            unset($data['category_id']);
        }
        $course = $this->repository->first($id);
        $this->repository->syncCourseAndCategories($course, $categoriesIds);
        parent::updateById($id, $data);
    }

    public function paginateCreatorCourses(string $id): LengthAwarePaginator
    {
        return $this->repository->where(['user_id' => $id])->paginate();
    }

    public function paginateCreatorCoursesTrashed(string $id): LengthAwarePaginator
    {
        return $this->repository->onlyTrashed('')->where(['user_id' => $id])->paginate();
    }
}
