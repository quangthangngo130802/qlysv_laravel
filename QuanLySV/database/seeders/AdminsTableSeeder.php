<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\AdminRoles;
use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Roles::where('role_name', 'Admin')->first();
        $roleEditor = Roles::where('role_name', 'Editor')->first();
        $roleViewer = Roles::where('role_name', 'Viewer')->first();
        //AdminRoles::truncate();//có ràng buộc khóa ngoại ko dùng truncate() được
        AdminRoles::truncate();
        Admin::truncate();
        $admin = Admin::create([
            'admin_email' => 'admin1@gmail.com',
            'admin_password' => bcrypt('1'),
            'admin_name' => 'Nhật Tinh Ngao',
            'admin_phone' => '0978987765',
            'admin_avatar' => 'gv1.jpg'
        ]);
        $editor = Admin::create([
            'admin_email' => 'editor1@gmail.com',
            'admin_password' => bcrypt('1'),
            'admin_name' => 'ChiPu',
            'admin_phone' => '0978987657',
            'admin_avatar' => 'gv1.jpg'
        ]);
        $viewer = Admin::create([
            'admin_email' => 'viewer1@gmail.com',
            'admin_password' => bcrypt('1'),
            'admin_name' => 'Elon Musk',
            'admin_phone' => '0978987885',
            'admin_avatar' => 'gv1.jpg'
        ]);
        $admin->roles()->attach($roleAdmin->role_id);
        $editor->roles()->attach($roleEditor->role_id);
        $viewer->roles()->attach($roleViewer->role_id);
        Admin::factory(10)->create();
    }
}
