<?php

namespace Database\Factories;

use App\Models\VisitType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VisitType>
 */
class VisitTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(10, 100),
        ];
    }
}
