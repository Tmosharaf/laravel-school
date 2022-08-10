<?php

namespace Database\Factories;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('123456'),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'image' => $this->faker->imageUrl(),
            'status' => 'active',
            'education' => $this->faker->sentence,
            'experience' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'class_teacher' => Classes::all()->random()->name,
        ];
    }
}
