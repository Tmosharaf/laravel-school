<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Routine>
 */
class RoutineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'classes_id' => Classes::all()->random()->id,
            'day' => $this->faker->dayOfWeek,
            'time'  => $this->faker->time('H:i'),
            'subject_id' => Subject::all()->random()->id,
            'teacher_id' => Teacher::all()->random()->id,

        ];
    }
}
