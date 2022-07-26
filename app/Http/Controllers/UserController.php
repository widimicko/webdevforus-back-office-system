<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.users.users', [
            'users' => User::all()
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $validatedRequest = $request->validated();

        $validatedRequest['password'] = Hash::make('password');
        $validatedRequest['verified_at'] = now();

        User::create($validatedRequest);
        return redirect()->back()->with('success', 'User created successfully');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        if ($user->email != $request['email']) {
            $request->validate(['email' => 'unique:users']);
        }

        $user->update($request->validated());
        return response()->json(['message' => 'User updated successfully']);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
