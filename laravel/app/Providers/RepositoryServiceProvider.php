<?php

namespace App\Providers;

use App\Repositories\AboutCourseRepository;
use App\Repositories\BaseRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CommentRepository;
use App\Repositories\CourseRepository;
use App\Repositories\ExaminationRepository;
use App\Repositories\Interfaces\AboutCourseRepositoryInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Repositories\Interfaces\ExaminationRepositoryInterface;
use App\Repositories\Interfaces\LessonContentRepositoryInterface;
use App\Repositories\Interfaces\LessonRepositoryInterface;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Repositories\Interfaces\QuestionGroupRepositoryInterface;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Repositories\Interfaces\QuestionResponseRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\ScaleCriteriaRepositoryInterface;
use App\Repositories\Interfaces\UserAnswerRepositoryInterface;
use App\Repositories\Interfaces\UserProgressRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\LessonContentRepository;
use App\Repositories\LessonRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\QuestionGroupRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\QuestionResponseRepository;
use App\Repositories\RoleRepository;
use App\Repositories\ScaleCriteriaRepository;
use App\Repositories\UserAnswerRepository;
use App\Repositories\UserProgressRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(LessonRepositoryInterface::class,LessonRepository::class);
        $this->app->bind(ExaminationRepositoryInterface::class, ExaminationRepository::class);
        $this->app->bind(ScaleCriteriaRepositoryInterface::class,ScaleCriteriaRepository::class);
        $this->app->bind(CommentRepositoryInterface::class,CommentRepository::class);
        $this->app->bind(QuestionGroupRepositoryInterface::class,QuestionGroupRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class,QuestionRepository::class);
        $this->app->bind(QuestionResponseRepositoryInterface::class,QuestionResponseRepository::class);
        $this->app->bind(UserAnswerRepositoryInterface::class,UserAnswerRepository::class);
        $this->app->bind(LessonContentRepositoryInterface::class,LessonContentRepository::class);
        $this->app->bind(AboutCourseRepositoryInterface::class,AboutCourseRepository::class);
        $this->app->bind(UserProgressRepositoryInterface::class, UserProgressRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
