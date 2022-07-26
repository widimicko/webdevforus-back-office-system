<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;

class DashboardController extends Controller
{
    public function redirectByRole() {
      if (Auth::user()->role == 'Admin') return redirect()->route('groups.index'); 
      else if (Auth::user()->role == 'Member') return dd('Member');
      else abort(403);
    }

    public function showProfile() {
      return view('dashboard.profile');
    }

    public function updateProfile(UpdateProfileRequest $request) {
      User::find(Auth::id())->update($request->validated());
      return redirect()->route('profile')->with('success', 'Profile successfully updated');
    }
}
