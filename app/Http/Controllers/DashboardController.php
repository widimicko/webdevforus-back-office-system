<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function redirectByRole() {
      if (Auth::user()->role == 'Admin') return redirect()->route('groups.index'); 
      else if (Auth::user()->role == 'Member') return dd('Member');
      else abort(403);
    }
}
