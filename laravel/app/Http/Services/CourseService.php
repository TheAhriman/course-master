<?php

namespace App\Http\Services;

use App\Http\Services\BaseService;
use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\CourseRepositoryInterface;

class CourseService extends BaseService
{
    /**
     * @param CourseRepositoryInterface $repository
     */
    public function __construct(CourseRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function createCourseAndCategories(array $data): void
    {
        $this->repository->create($data);
        if (array_key_exists('category_id',$data)){
            $categoriesIds = $data['category_id'];
            unset($data['category_id']);
            $course = $this->repository->findLastCourse();
            $this->repository->syncCourseAndCategories($course, $categoriesIds);
        }
    }

    public function updateCourseAndCategories(array $data, string $id): void
    {
        $categoriesIds = [];
        if (array_key_exists('category_id',$data)){
            $categoriesIds = $data['category_id'];
            unset($data['category_id']);
        }
        $course = $this->repository->findById($id);
        $this->repository->syncCourseAndCategories($course, $categoriesIds);
        parent::updateById($id, $data);
    }
}
