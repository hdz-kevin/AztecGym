<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Membership;
use App\Models\MembershipType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $general = MembershipType::where('name', 'General')->first();
        $student = MembershipType::where('name', 'Estudiante')->first();

        $members = Member::inRandomOrder()->limit(50)->get();

        // Create a membership for each member
        $members->each(function (Member $member) use ($general, $student) {
            $membershipType = (rand(1, 10) <= 6) ? $general : $student;

            Membership::factory()->create([
                'member_id' => $member->id,
                'membership_type_id' => $membershipType->id,
            ]);
        });
    }
}
