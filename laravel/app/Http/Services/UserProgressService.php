<?php

namespace App\Http\Services;

use App\DTO\UpdateUserProgressDTO;
use App\Models\User;
use App\Models\UserProgress;
use App\Repositories\Interfaces\UserProgressRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class UserProgressService extends BaseService
{
    /**
     * @param UserProgressRepositoryInterface $repository
     */
    public function __construct(UserProgressRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function paginateFinishedPupils(): LengthAwarePaginator
    {
        return $this->repository->where(['finished' => true, 'author_id' => Auth::id()])->paginate();
    }

    public function updateToNextLesson(UserProgress $userProgress, Collection $lessons): void
    {
        $lessons = $lessons->getIterator();

        while($lessons->current()->id !== $userProgress->lesson_id)
            $lessons->next();

        $lessons->next();
        parent::updateById($userProgress->id, new UpdateUserProgressDTO($lessons->current()->id, false));
    }

    public function checkFinishedLessons(User $user): bool
    {
        return $this->repository->where(['author_id' => $user->id, 'finished' => true])->count();
    }
}
