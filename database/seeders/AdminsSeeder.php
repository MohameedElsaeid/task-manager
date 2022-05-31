<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    public function run(): void
    {
        Admin::factory()->count(100)->create();
    }
}
