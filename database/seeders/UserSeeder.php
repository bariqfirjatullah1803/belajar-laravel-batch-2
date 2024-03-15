<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::create([
            'name' => 'super admin',
            'email' => 'superadmin@localhost.com',
            'password' => Hash::make('superadmin123123')
        ]);

        $superadmin->assignRole('superadmin');

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@localhost.com',
            'password' => Hash::make('admin123123')
        ]);

        $admin->assignRole('admin');
    }
}
