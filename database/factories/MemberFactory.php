<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'groupid' => $this->faker->numberBetween(1, 10),
            'nama' => fake()->name(),
            'alamat' => fake()->address(),
            'hp' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'profile_pic' => '',
            
        ];
    }
}
