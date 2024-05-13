<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    // Show user profile
    public function show()
    {
        $user = Auth::user();
        return view('user.profile.index', compact('user'));
    }

    // Edit user profile
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit', compact('user'));
    }

    // Update user profile
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('user.profile.show')->with('success', 'Profile updated successfully.');
    }

    // Edit user password
    public function password_edit()
    {
        return view('user.profile.password_edit');
    }

    // Update user password
    public function password_update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->route('user.profile.show')->with('success', 'Password updated successfully.');
    }

    // Delete user account
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        return redirect()->route('login')->with('success', 'Your account has been deleted.');
    }
}
