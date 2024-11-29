<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoneOfRemembrance>
 */
class StoneOfRemembranceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nameOfStone' => fake()->name(),
            'wayOfShowing' => fake()->unique()->safeEmail(),
            'contextToWord' => fake()->name(),
        ];
    }
}
