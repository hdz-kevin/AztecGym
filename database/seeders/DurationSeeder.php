<?php

namespace Database\Seeders;

use App\Enums\DurationUnit;
use App\Models\Duration;
use App\Models\MembershipType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $general = MembershipType::where('name', 'General')->first();
        $student = MembershipType::where('name', 'Estudiante')->first();

        $general->durations()
            ->createMany([
                [
                    'name' => 'Mensual',
                    'amount' => 1,
                    'unit' => DurationUnit::MONTH,
                    'price' => 400,
                ],
                [
                    'name' => 'Bimestral',
                    'amount' => 2,
                    'unit' => DurationUnit::MONTH,
                    'price' => 700,
                ],
                [
                    'name' => '2 Semanas',
                    'amount' => 2,
                    'unit' => DurationUnit::WEEK,
                    'price' => 250,
                ],
            ]);

        $student->durations()
            ->createMany([
                [
                    'name' => 'Mensual',
                    'amount' => 1,
                    'unit' => DurationUnit::MONTH,
                    'price' => 350,
                ],
                [
                    'name' => 'Bimestral',
                    'amount' => 2,
                    'unit' => DurationUnit::MONTH,
                    'price' => 600,
                ],
                [
                    'name' => '2 Semanas',
                    'amount' => 2,
                    'unit' => DurationUnit::WEEK,
                    'price' => 200,
                ],
            ]);
    }
}
