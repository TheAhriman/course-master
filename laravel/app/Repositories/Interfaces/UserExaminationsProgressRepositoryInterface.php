<?php

namespace App\Repositories\Interfaces;

interface UserExaminationsProgressRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param string $user_id
     * @param string $examination_id
     * @return mixed
     */
    public function firstByUserIdAndExaminationId(string $user_id, string $examination_id);
}
