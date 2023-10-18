<?php

namespace App\Http\Services;

use App\Http\Services\BaseService;
use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService extends BaseService
{
    /**
     * @param CategoryRepositoryInterface $repository
     */
    public function __construct(CategoryRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
