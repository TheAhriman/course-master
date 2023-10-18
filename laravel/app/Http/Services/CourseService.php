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
        $categoriesIds = $data['category_id'];
        unset($data['category_id']);
        $this->repository->create($data);
        if ($categoriesIds != null){
            $course = $this->repository->findLastCourse();
            $this->repository->syncCourseAndCategories($course, $categoriesIds);
        }
    }

    public function updateCourseAndCategories(array $data, string $id): void
    {
        if ($data['category_id'] != null){
            $categoriesIds = $data['category_id'];
            unset($data['category_id']);
            $course = $this->repository->findById($id);
            $this->repository->syncCourseAndCategories($course, $categoriesIds);
        }
        parent::updateById($id, $data);
    }
}
