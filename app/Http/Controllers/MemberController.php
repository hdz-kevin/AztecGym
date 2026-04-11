<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::with([
            'currentMembership',
            'currentMembership.membershipType',
        ])->get();

        return Inertia::render('members/Index', [
            'members' => $members,
        ]);
    }
}
