<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    public function store(ChangePasswordRequest $request) {
      User::find(Auth::id())->update(['password' => Hash::make($request['password'])]);

      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect('login')->with('success', 'Password successfully updated, please login again');
    }
}
