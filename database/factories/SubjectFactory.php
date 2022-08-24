<?php

namespace Database\Factories;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'subject_name' => $this->faker->randomElement(['Bangla', 'English', 'Arabic', 'Math', 'ICT', 'Science']),
            'subject_code' => $this->faker->randomElement(['101', '102', '103', '104', '105', '106']),
            'classes_id'    =>  Classes::all()->random()->id
        ];
    }
}
