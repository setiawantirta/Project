<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create super admin user first
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@itera.ac.id',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $this->call([
            RoleSeeder::class,
            ProgramSeeder::class,
        ]);

        // Assign super_admin role
        $superAdmin->assignRole('super_admin');
        $this->command->info('');
        $this->command->info("✅ Super Admin created: {$superAdmin->email} (password: password)");
        $this->command->info("✅ Super Admin role assigned successfully");
    }
}
