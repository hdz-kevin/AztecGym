<?php

namespace Database\Factories;

use App\Enums\DurationUnit;
use App\Models\Duration;
use App\Models\MembershipType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Duration>
 */
class DurationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Arbitrary values
        return [
            'membership_type_id' => MembershipType::factory(),
            'name' => $this->faker->word(),
            'amount' => random_int(1, 6),
            'unit' => $this->faker->randomElement(DurationUnit::values()),
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
