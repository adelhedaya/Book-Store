<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); 

        if (!$user) {
            return redirect()->route('login')->withErrors('You must be logged in to access this page.');
        }

        $profile = Profile::where('user_id', $user->id)->first(); 
        return view('student.profile.edit', compact('user', 'profile')); 
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
            return redirect()->route('login');
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

    

        return redirect()->route('student.dashboard');
    }

    public function destroy()
    {
        $user = Auth::user(); 

        if (!$user) {
            return redirect()->route('login');
        }

        $profile = Profile::where('user_id', $user->id)->first();
        if ($profile) {
            $profile->delete();
        }

     

        return redirect('/');
    }
}
