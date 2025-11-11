<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'code' => 'SD',
                'name' => 'Sains Data',
                'slug' => 'sains-data',
                'level' => 'S1',
                'accreditation' => 'A',
                'accreditation_year' => 2023,
                'email' => 'sdata@itera.ac.id',
                'phone' => '0721-8030188',
                'description' => 'Program Studi Sains Data',
                'is_active' => true,
            ],
            [
                'code' => 'BI',
                'name' => 'Biologi',
                'slug' => 'biologi',
                'level' => 'S1',
                'accreditation' => 'B',
                'accreditation_year' => 2022,
                'email' => 'biologi@itera.ac.id',
                'phone' => '0721-8030189',
                'description' => 'Program Studi Biologi',
                'is_active' => true,
            ],
            [
                'code' => 'KI',
                'name' => 'Kimia',
                'slug' => 'kimia',
                'level' => 'S1',
                'accreditation' => 'B',
                'accreditation_year' => 2022,
                'email' => 'kimia@itera.ac.id',
                'phone' => '0721-8030190',
                'description' => 'Program Studi Kimia',
                'is_active' => true,
            ],
            [
                'code' => 'FI',
                'name' => 'Fisika',
                'slug' => 'fisika',
                'level' => 'S1',
                'accreditation' => 'B',
                'accreditation_year' => 2021,
                'email' => 'fisika@itera.ac.id',
                'phone' => '0721-8030191',
                'description' => 'Program Studi Fisika',
                'is_active' => true,
            ],
            [
                'code' => 'MA',
                'name' => 'Matematika',
                'slug' => 'matematika',
                'level' => 'S1',
                'accreditation' => 'B',
                'accreditation_year' => 2022,
                'email' => 'matematika@itera.ac.id',
                'phone' => '0721-8030192',
                'description' => 'Program Studi Matematika',
                'is_active' => true,
            ],
        ];

        foreach ($programs as $programData) {
            $program = Program::create($programData);
            
            $this->command->info("✅ Program {$program->name} created successfully!");
        }

        // Assign super admin to all programs
        $superAdmin = User::first();
        if ($superAdmin) {
            foreach (Program::all() as $program) {
                $superAdmin->programs()->attach($program->id, ['role' => 'super_admin']);
            }
            $this->command->info('');
            $this->command->info("✅ Super Admin assigned to all programs!");
        }
    }
}
