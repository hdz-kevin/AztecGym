<?php

namespace Database\Seeders;

use App\Models\Visit;
use Illuminate\Database\Seeder;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Visit::factory()
            ->count(40)
            ->create()
            ->each(function (Visit $visit) {
                Visit::withoutTimestamps(fn () =>  $visit->update([
                'created_at' => $visit->visit_at,
                'updated_at' => $visit->visit_at,
            ]));
        });
    }
}
