<?php

namespace App\Services;

use App\Repositories\AdminsRepository;
use App\Repositories\UsersRepository;
use Illuminate\Database\Eloquent\Collection;

class AdminsService
{
    private AdminsRepository $adminsRepository;

    public function __construct(AdminsRepository $adminsRepository)
    {
        $this->adminsRepository = $adminsRepository;
    }

    public function getAllAdmins(): Collection|array
    {
        return $this->adminsRepository->get();
    }
}
