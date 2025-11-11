# 📚 Panduan Lengkap Setup Sistem Informasi Akademik

## ✅ Progress Setup

### Completed ✓
1. ✅ Laravel 12 Installation
2. ✅ Filament 4 Installation  
3. ✅ Filament Shield Installation
4. ✅ AdminPanel Created (`/admin`)
5. ✅ ProgramPanel Created (`/program`)
6. ✅ Database Schema & Migrations (23 tables)
7. ✅ Spatie Permission Setup
8. ✅ All Migrations Run Successfully

### In Progress 🔄
- **Models & Relationships** (60% complete)
  - ✅ User (with Filament User, HasRoles, SoftDeletes)
  - ✅ Program (Tenant model)
  - ✅ Student (with relationships)
  - ✅ Lecturer (with relationships)
  - ✅ Course (with relationships)
  - ✅ CourseSchedule (with relationships)
  - ✅ FinalProject (with relationships)
  - ⏳ Remaining 16 models need completion

### Pending ⏳
1. Complete remaining Models
2. Configure Filament Shield
3. Setup Panel Configuration (Tenancy)
4. Create Resources for AdminPanel
5. Create Resources for ProgramPanel
6. Implement Policies
7. Create Seeders
8. Setup Dashboard Widgets

---

## 📋 Database Structure

### Core Tables (Tenant Management)
- `programs` - Program Studi (Tenant)
- `users` - User accounts
- `students` - Data Mahasiswa
- `lecturers` - Data Dosen

### E-Learning & OBE Tables
- `courses` - Mata Kuliah
- `course_schedules` - Jadwal Kuliah
- `course_enrollments` - KRS Mahasiswa
- `quizzes` - Kuis/Ujian
- `quiz_questions` - Soal Kuis
- `student_quiz_attempts` - Jawaban Mahasiswa
- `learning_outcomes` - CPL/CPMK (OBE)

### Tugas Akhir Tables
- `final_projects` - Tugas Akhir
- `final_project_supervisors` - Pembimbing TA
- `final_project_seminars` - Seminar (Proposal/Sidang)

### Perwalian Tables
- `academic_advisings` - Perwalian & KRS
- `advising_schedules` - Jadwal Dosen Wali
- `advising_bookings` - Booking Perwalian

### Keuangan Tables
- `budgets` - Pagu Anggaran
- `activity_plans` - Rencana Kegiatan
- `budget_proposals` - RAB
- `budget_approvals` - Validasi RAB
- `transactions` - Transaksi Keuangan
- `accountability_reports` - LPJ

### Permission Tables (Spatie)
- `roles`
- `permissions`
- `model_has_permissions`
- `model_has_roles`
- `role_has_permissions`

---

## 🎯 Role Structure

### Global Roles (AdminPanel)
- **super_admin** - Full access
- **dean** - Dekan Fakultas
- **vice_dean** - Wadek
- **finance_staff** - Tendik Keuangan Fakultas

### Tenant Roles (ProgramPanel)
- **program_coordinator** - Koordinator Prodi
- **curriculum_coordinator** - Koordinator Kurikulum
- **knowledge_coordinator** - GKMP
- **pr_coordinator** - Koordinator Humas
- **internship_coordinator** - Koordinator Magang
- **lecturer** - Dosen
- **student** - Mahasiswa

---

## 🔧 Next Steps

### 1. Melengkapi Models (Priority: HIGH)

Buat/lengkapi file models berikut dengan relationships:

```bash
# E-Learning Models
app/Models/CourseEnrollment.php
app/Models/Quiz.php
app/Models/QuizQuestion.php
app/Models/StudentQuizAttempt.php
app/Models/LearningOutcome.php

# Final Project Models
app/Models/FinalProjectSupervisor.php
app/Models/FinalProjectSeminar.php

# Advising Models
app/Models/AcademicAdvising.php
app/Models/AdvisingSchedule.php
app/Models/AdvisingBooking.php

# Finance Models
app/Models/Budget.php
app/Models/ActivityPlan.php
app/Models/BudgetProposal.php
app/Models/BudgetApproval.php
app/Models/Transaction.php
app/Models/AccountabilityReport.php
```

### 2. Configure Tenancy

Edit `app/Providers/Filament/ProgramPanelProvider.php`:

```php
use Filament\Panel;
use App\Models\Program;

public function panel(Panel $panel): Panel
{
    return $panel
        ->id('program')
        ->path('program')
        ->tenant(Program::class)
        ->tenantRoutePrefix('prodi')
        ->tenantSlugAttribute('slug')
        // ... rest of configuration
}
```

### 3. Install Filament Shield

```bash
php artisan shield:install --fresh --minimal

php artisan shield:generate --all
```

### 4. Create Seeders

```bash
php artisan make:seeder RoleSeeder
php artisan make:seeder ProgramSeeder
php artisan make:seeder UserSeeder
```

### 5. Create Resources

**AdminPanel Resources:**
```bash
php artisan make:filament-resource Program --panel=admin --generate
php artisan make:filament-resource User --panel=admin --generate
```

**ProgramPanel Resources:**
```bash
php artisan make:filament-resource Student --panel=program --generate
php artisan make:filament-resource Lecturer --panel=program --generate
php artisan make:filament-resource Course --panel=program --generate
php artisan make:filament-resource FinalProject --panel=program --generate
php artisan make:filament-resource Budget --panel=program --generate
```

---

## 📝 Model Relationships Cheatsheet

### Relationships yang sudah dibuat:

**User Model:**
- `hasOne(Student::class)`
- `hasOne(Lecturer::class)`

**Program Model (Tenant):**
- `hasMany(Student::class)`
- `hasMany(Lecturer::class)`
- `hasMany(Course::class)`
- `hasMany(CourseSchedule::class)`
- `hasMany(FinalProject::class)`
- `hasMany(Budget::class)`
- `hasMany(ActivityPlan::class)`

**Student Model:**
- `belongsTo(Program::class)`
- `belongsTo(User::class)`
- `belongsTo(Lecturer::class, 'academic_advisor_id')` - Dosen Wali
- `hasMany(CourseEnrollment::class)`
- `hasMany(StudentQuizAttempt::class)`
- `hasMany(AcademicAdvising::class)`
- `hasMany(AdvisingBooking::class)`
- `hasOne(FinalProject::class)`

**Lecturer Model:**
- `belongsTo(Program::class)`
- `belongsTo(User::class)`
- `hasMany(CourseSchedule::class)` - Jadwal mengajar
- `hasMany(Student::class, 'academic_advisor_id')` - Mahasiswa perwalian
- `hasMany(AcademicAdvising::class)` - Sesi perwalian
- `hasMany(AdvisingSchedule::class)` - Jadwal konsultasi
- `hasMany(FinalProjectSupervisor::class)` - Bimbingan TA

**Course Model:**
- `belongsTo(Program::class)`
- `hasMany(CourseSchedule::class)`
- `hasMany(LearningOutcome::class)`

**CourseSchedule Model:**
- `belongsTo(Program::class)`
- `belongsTo(Course::class)`
- `belongsTo(Lecturer::class)`
- `hasMany(CourseEnrollment::class)`
- `hasMany(Quiz::class)`

**FinalProject Model:**
- `belongsTo(Program::class)`
- `belongsTo(Student::class)`
- `hasMany(FinalProjectSupervisor::class)`
- `hasMany(FinalProjectSeminar::class)`

---

## 🎨 UI/UX Features to Implement

### Dashboard Widgets
- [ ] Total Students per Program
- [ ] Active Courses
- [ ] Pending Final Projects
- [ ] Budget Utilization Chart
- [ ] Recent Activities

### E-Learning Features
- [ ] Quiz Builder dengan drag-drop
- [ ] Real-time Quiz Timer
- [ ] Automatic Grading (Multiple Choice)
- [ ] OBE Analysis Dashboard
- [ ] Learning Outcome Mapping

### Tugas Akhir Features
- [ ] Supervisor Assignment System
- [ ] Seminar Scheduling Calendar
- [ ] Progress Tracking
- [ ] Document Upload & Management
- [ ] Revision Tracking

### Perwalian Features
- [ ] Booking Calendar Interface
- [ ] KRS Approval Workflow
- [ ] Student Progress Report
- [ ] Auto-notification system

### Keuangan Features
- [ ] Budget Allocation Dashboard
- [ ] RAB Builder
- [ ] Multi-level Approval Workflow
- [ ] Export KAK & RAB to PDF/Excel
- [ ] Transaction Recording
- [ ] LPJ Report Generator

---

## 🔐 Security & Policies

### Policies to Create
```bash
php artisan make:policy StudentPolicy --model=Student
php artisan make:policy LecturerPolicy --model=Lecturer
php artisan make:policy CoursePolicy --model=Course
php artisan make:policy FinalProjectPolicy --model=FinalProject
php artisan make:policy BudgetPolicy --model=Budget
```

### Permission Structure
- `view_any_{resource}` - Can view list
- `view_{resource}` - Can view detail
- `create_{resource}` - Can create
- `update_{resource}` - Can edit
- `delete_{resource}` - Can delete
- `restore_{resource}` - Can restore soft deleted
- `force_delete_{resource}` - Can permanently delete

---

## 📄 Configuration Files

### Important Config Files
- `config/filament-shield.php` - Shield configuration
- `config/permission.php` - Spatie Permission config
- `app/Providers/Filament/AdminPanelProvider.php` - Admin Panel config
- `app/Providers/Filament/ProgramPanelProvider.php` - Program Panel config

---

## 🧪 Testing

### Create Tests
```bash
php artisan make:test StudentTest
php artisan make:test LecturerTest
php artisan make:test CourseEnrollmentTest
php artisan make:test FinalProjectTest
php artisan make:test BudgetTest
```

---

## 📞 Support & Resources

### Documentation Links
- Laravel: https://laravel.com/docs
- Filament: https://filamentphp.com/docs
- Filament Shield: https://github.com/bezhanSalleh/filament-shield
- Spatie Permission: https://spatie.be/docs/laravel-permission

### Commands Cheatsheet
```bash
# Clear cache
php artisan optimize:clear

# Generate IDE helper (optional)
composer require --dev barryvdh/laravel-ide-helper
php artisan ide-helper:generate
php artisan ide-helper:models

# Run migrations
php artisan migrate:fresh --seed

# Create admin user
php artisan make:filament-user

# Generate Shield permissions
php artisan shield:generate --all
```

---

Dibuat: 10 November 2025
Status: In Development
Version: 1.0.0
