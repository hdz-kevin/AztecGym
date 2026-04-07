<?php

namespace Database\Seeders;

use App\Models\MembershipType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MembershipType::factory()->create(['name' => 'General']);
        MembershipType::factory()->create(['name' => 'Estudiante']);
    }
}
