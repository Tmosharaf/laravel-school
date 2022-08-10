<?php

namespace Database\Factories;

use App\Models\Classes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
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
            'roll' => $this->faker->unique()->numberBetween(1, 1000),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'age' => $this->faker->numberBetween(1, 100),
            'gender' => $this->faker->randomElement(['M', 'F']),
            'fathers_name' => $this->faker->name,
            'mothers_name' => $this->faker->name,
            'address' => $this->faker->address,
            'image' => $this->faker->imageUrl(300, 300),
            'password' => Hash::make('123456'),
            'group' => $this->faker->randomElement(['A', 'B', 'C']),
            'session' => $this->faker->year('+10 years'),
            'classes_id' => Classes::all()->random()->id,
        ];
    }
}
