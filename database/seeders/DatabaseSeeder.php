<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
        ]);

        $this->call([
            MemberSeeder::class,
            MembershipTypeSeeder::class,
            DurationSeeder::class,
            MembershipSeeder::class,
            PeriodSeeder::class,
            VisitTypeSeeder::class,
            VisitSeeder::class,
        ]);
    }
}
