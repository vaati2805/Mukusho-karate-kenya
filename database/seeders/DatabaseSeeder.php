<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create super admin user for Mukusho Karate Kenya
        User::updateOrCreate(
            ['email' => 'admin@mukushokarate.co.ke'],
            [
                'name' => 'Admin',
                'password' => Hash::make('mukusho2025'),
                'role' => 'super_admin',
                'status' => 'approved',
                'permissions' => [
                    'members'  => ['view' => true, 'edit' => true],
                    'payments' => ['view' => true, 'edit' => true],
                    'content'  => ['view' => true, 'edit' => true],
                    'users'    => ['view' => true, 'edit' => true],
                ],
            ]
        );
    }
}
