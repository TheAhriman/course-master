<?php

namespace App\Http\Services;

use App\Repositories\RoleRepository;

class RoleService
{
    /**
     * @var $poleRepository
     */
    protected $roleRepository;

    /**
     * PoleService constructor
     *
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
}
