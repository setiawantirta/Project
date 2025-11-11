# Install Package
composer create-project laravel/laravel . "^12.0"
composer require filament/filament:"^4.0"

# Push Github
echo "# Project" >> README.md
git init
git add README.md
git add .
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/setiawantirta/Project.git
git push -u origin main

# Push Simple
git add .
git commit -m "3 commit"
git branch -M main
git push -u origin main

# Install Panel
php artisan make:filament-panel admin
php artisan make:filament-panel program

# Setting Akademik
php artisan make:model Program -m
php artisan make:model Student -m
php artisan make:model Lecturer -m

# OBE
php artisan make:model Course -m
php artisan make:model ProgramOutcome -m
php artisan make:model LearningOutcome -m
php artisan make:model CourseOutcome -m
php artisan make:model SubcourseOutcome -m
php artisan make:model Indicator -m

# Tugas Akhir
php artisan make:model FinalProject -m
php artisan make:model FinalProjectSupervisor -m
php artisan make:model FinalProjectSeminar -m

# Bimbingan
php artisan make:model AcademicAdvising -m
php artisan make:model AdvisingSchedule -m
php artisan make:model AdvisingBooking -m

# E-Learning
php artisan make:model CourseSchedule -m
php artisan make:model Quiz -m
php artisan make:model QuizQuestion -m
php artisan make:model StudentQuizAttempt -m
php artisan make:model CourseEnrollment -m

# Keuangan
php artisan make:model Budget -m
php artisan make:model ActivityPlan -m
php artisan make:model BudgetProposal -m
php artisan make:model BudgetApproval -m
php artisan make:model Transaction -m
php artisan make:model AccountabilityReport -m

# Migrate
php artisan migrate

# Install Filament Shield
composer require bezhansalleh/filament-shield
php artisan vendor:publish --tag="filament-shield-config"
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

php artisan make:filament-resource Program --panel=admin --generate
php artisan shield:install
php artisan shield:generate --all
php artisan shield:generate --all --panel=program 

php artisan make:filament-user

# Opsional
php artisan make:seeder RoleSeeder
php artisan make:seeder ProgramSeeder
php artisan migrate:fresh --seed