<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_roll' => Student::all()->random()->roll,
            'class_name' => Classes::all()->random()->name,
            'date' => $this->faker->dateTimeBetween('-1 week', 'now')->format('d-m-Y'),
            'status' => $this->faker->randomElement(['present', 'absent']),
        ];
    }
}
