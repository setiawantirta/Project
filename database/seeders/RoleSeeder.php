<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Global Roles (AdminPanel)
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $dean = Role::firstOrCreate(['name' => 'dean', 'guard_name' => 'web']);
        $viceDean = Role::firstOrCreate(['name' => 'vice_dean', 'guard_name' => 'web']);
        $financeStaff = Role::firstOrCreate(['name' => 'finance_staff', 'guard_name' => 'web']);

        // Tenant Roles (ProgramPanel)
        $programCoordinator = Role::firstOrCreate(['name' => 'program_coordinator', 'guard_name' => 'web']);
        $curriculumCoordinator = Role::firstOrCreate(['name' => 'curriculum_coordinator', 'guard_name' => 'web']);
        $knowledgeCoordinator = Role::firstOrCreate(['name' => 'knowledge_coordinator', 'guard_name' => 'web']);
        $prCoordinator = Role::firstOrCreate(['name' => 'pr_coordinator', 'guard_name' => 'web']);
        $internshipCoordinator = Role::firstOrCreate(['name' => 'internship_coordinator', 'guard_name' => 'web']);
        $lecturer = Role::firstOrCreate(['name' => 'lecturer', 'guard_name' => 'web']);
        $student = Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);

        // Give super_admin all permissions (sync to replace existing)
        $superAdmin->syncPermissions(Permission::all());

        $this->command->info('✅ Roles created successfully!');
        $this->command->info('');
        $this->command->info('Global Roles:');
        $this->command->info('  - super_admin');
        $this->command->info('  - dean');
        $this->command->info('  - vice_dean');
        $this->command->info('  - finance_staff');
        $this->command->info('');
        $this->command->info('Tenant Roles:');
        $this->command->info('  - program_coordinator');
        $this->command->info('  - curriculum_coordinator');
        $this->command->info('  - knowledge_coordinator');
        $this->command->info('  - pr_coordinator');
        $this->command->info('  - internship_coordinator');
        $this->command->info('  - lecturer');
        $this->command->info('  - student');
    }
}
