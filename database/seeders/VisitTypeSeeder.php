<?php

namespace Database\Seeders;

use App\Models\VisitType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisitType::factory()->create([
            'name' => 'General',
            'price' => 40,
        ]);
    }
}
