<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UsersRepository
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get(): Collection|array
    {
        return $this->user->newQuery()->select([
            'users.user_id',
            'users.name as user_name',
        ])->orderBy('user_id')->get();
    }
}
