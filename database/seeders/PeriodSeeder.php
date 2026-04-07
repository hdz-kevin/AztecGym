<?php

namespace Database\Seeders;

use App\Enums\DurationUnit;
use App\Models\Membership;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $memberships = Membership::with('membershipType.durations')->get();

        $memberships->each(function (Membership $membership) {
            $periodsToCreate = rand(1, 8);

            // Start a few months ago
            $startDate = Carbon::now()->subMonths($periodsToCreate);

            for ($i = 0; $i < $periodsToCreate; $i++) {
                $duration = $membership->membershipType->durations->random();
                // Todo: Move calculate end_date logic to a more appropriate place
                $endDate = match ($duration->unit) {
                    DurationUnit::DAY => $startDate->copy()->addDays($duration->amount),
                    DurationUnit::WEEK => $startDate->copy()->addWeeks($duration->amount),
                    DurationUnit::MONTH => $startDate->copy()->addMonths($duration->amount),
                };

                $period = $membership->periods()->create([
                    'duration_id' => $duration->id,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'price_paid' => $duration->price,
                ]);

                // Sync created_at and updated_at to the period's start_date
                Period::withoutTimestamps(fn () => $period->update([
                    'created_at' => $startDate,
                    'updated_at' => $startDate,
                ]));

                // Start date of the next period
                $startDate = $endDate;

                // Simulate some random breaks between periods
                if (rand(1, 10) <= 3) {
                    $startDate->addDays(rand(1, 20));
                }
            }

            // Set membership created_at and updated_at to match first period created_at and updated_at
            Membership::withoutTimestamps(fn () => $membership->update([
                'created_at' => $membership->firstPeriod->created_at,
                'updated_at' => $membership->firstPeriod->created_at,
            ]));
        });
    }
}
