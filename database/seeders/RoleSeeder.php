<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Role::updateOrCreate(
            ['title' => 'Admin'],
            ['slug' => 'admin']
        );
        Role::updateOrCreate(
            ['title' => 'User'],
            ['slug' => 'user']
        );
    }
}
