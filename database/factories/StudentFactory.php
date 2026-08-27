<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id' => fake()->unique()->numerify('2026-#####'),
            'first_name' => fake()->firstName(),
            'middle_name' => null,
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'mobile_number' => '09'.fake()->numerify('#########'),
            'date_of_birth' => fake()->dateTimeBetween('-25 years', '-16 years')->format('Y-m-d'),
            'gender' => fake()->randomElement(['Male', 'Female', 'Prefer not to say']),
            'program' => fake()->randomElement(['BSIT', 'BSCS', 'BSIS', 'BSEMC']),
            'year_level' => fake()->numberBetween(1, 4),
            'address' => fake()->address(),
            'profile_picture' => 'student-profiles/sample.png',
        ];
    }
}
