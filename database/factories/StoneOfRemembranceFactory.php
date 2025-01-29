<?php

namespace Database\Factories;

use App\Models\StoneOfRemembrance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StoneOfRemembrance>
 */
class StoneOfRemembranceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nameOfStone' => fake()->name(),
            'wayOfShowing' => fake()->unique()->safeEmail(),
            'contextToWord' => fake()->name(),
        ];
    }
}
