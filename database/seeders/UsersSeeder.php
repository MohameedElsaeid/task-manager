<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class UsersSeeder extends Seeder
{

    public function run(): void
    {
        User::factory()->count(10000)->create();
        if (Cache::has('users')){
            Cache::pull('users');
        }
    }
}
