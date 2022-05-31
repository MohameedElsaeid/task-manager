<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Collection;

class AdminsRepository
{
    private Admin $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function get(): Collection|array
    {
        return $this->admin->newQuery()->select([
            'admins.admin_id',
            'admins.name as admin_name',
        ])->orderBy('admin_id')->get();
    }


}
