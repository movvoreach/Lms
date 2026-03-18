<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DefaultUsersSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Create roles (if not exist)
        $roles = ['admin', 'teacher', 'staff', 'student'];

        foreach ($roles as $r) {
            Role::firstOrCreate(['name' => $r, 'guard_name' => 'web']);
        }

        // ✅ Admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
            ]
        );
        $admin->syncRoles(['admin']);

        // ✅ Teacher
        $teacher = User::updateOrCreate(
            ['email' => 'teacher@gmail.com'],
            [
                'name' => 'Teacher',
                'password' => Hash::make('12345678'),
            ]
        );
        $teacher->syncRoles(['teacher']);

        // ✅ Staff
        $staff = User::updateOrCreate(
            ['email' => 'staff@gmail.com'],
            [
                'name' => 'Staff',
                'password' => Hash::make('12345678'),
            ]
        );
        $staff->syncRoles(['staff']);

        // ✅ Student
        $student = User::updateOrCreate(
            ['email' => 'student@gmail.com'],
            [
                'name' => 'Student',
                'password' => Hash::make('12345678'),
            ]
        );
        $student->syncRoles(['student']);
    }
}
