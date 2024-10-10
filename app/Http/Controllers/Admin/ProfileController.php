<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   
public function edit()
{
    $profile = Auth::user(); 

    if (!$profile) {
        return redirect()->route('admin.dashboard')->withErrors('Profile not found.');
    }

    return view('admin.profile.edit', compact('profile'));
}

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user(); 

        if (!$user) {
            return redirect()->route('login')->withErrors('You must be logged in to access this page.');
        }

       
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        

        return redirect()->route('admin.dashboard');
    }

    public function destroy()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors('You must be logged in to access this page.');
        }

       
        $profile = Profile::where('user_id', $user->id)->first();
        if ($profile) {
            $profile->delete();
        }

      

        return redirect('/');
    }
}
