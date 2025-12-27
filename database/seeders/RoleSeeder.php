<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'web_admin', 'label' => 'Web Administrator'],
            ['name' => 'admin', 'label' => 'Administrator'],
            ['name' => 'lecturer', 'label' => 'Lecturer'],
            ['name' => 'student', 'label' => 'Student'],
            ['name' => 'guest', 'label' => 'Guest'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role['name']], $role);
        }
    }
}
