<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Visit;
use App\Models\VisitType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Visit>
 */
class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $member = rand(1, 10) <= 7 ? Member::factory() : null;
        $visitType = VisitType::factory();

        return [
            'member_id' => $member,
            'visit_type_id' => $visitType,
            'visitor_name' => $member ? null : $this->faker->name(),
            'visit_at' => $this->faker->dateTimeThisMonth(),
            'price_paid' => $visitType->price,
        ];
    }
}
