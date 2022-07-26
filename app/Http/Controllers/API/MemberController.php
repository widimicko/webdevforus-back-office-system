<?php

namespace App\Http\Controllers\API;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function show(Member $member)
    {
        return response()->json($member);
    }
}
