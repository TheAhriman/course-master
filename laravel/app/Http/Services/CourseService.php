<?php

namespace App\Http\Services;

use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

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
     * @param array $data
     * @return void
     */
    public function createCourseAndCategories(array $data): void
    {
        if (array_key_exists('category_id',$data)){
            $categoriesIds = $data['category_id'];
            unset($data['category_id']);
            $this->repository->create($data);
            $course = $this->repository->findLastCourse();
            $this->repository->syncCourseAndCategories($course, $categoriesIds);
        } else {
            $this->repository->create($data);
        }
    }

    /**
     * @param array $data
     * @param string $id
     * @return void
     */
    public function updateCourseAndCategories(array $data, string $id): void
    {
        $categoriesIds = [];
        if (array_key_exists('category_id',$data)){
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
