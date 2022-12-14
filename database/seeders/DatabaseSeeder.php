<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ClassSedeer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        $this->call(ClassSedeer::class);
        \App\Models\Student::factory(15)->create();
        \App\Models\Attendance::factory(30)->create();
        \App\Models\Teacher::factory(5)->create();
        \App\Models\Subject::factory(12)->create();
        \App\Models\Routine::factory(16)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password'=> bcrypt('123456'),
        ]);

        
    }
}
