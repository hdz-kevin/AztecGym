<?php

namespace Database\Factories;

use App\Models\Duration;
use App\Models\Membership;
use App\Models\Period;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Period>
 */
class PeriodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $duration = Duration::factory();
        
        return [
            'membership_id' => Membership::factory(),
            'duration_id' => $duration,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'price_paid' => $duration->price,
        ];
    }
}
