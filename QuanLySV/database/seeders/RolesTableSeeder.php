<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::truncate();
        Roles::create(['role_name'=>'Admin']);
        Roles::create(['role_name'=>'Editor']);
        Roles::create(['role_name'=>'Viewer']);
    }
}
