<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    public function search(Request $request)
    {
        $userId = $request->input('user_id');

        if (!is_null($userId)) {
            $student = User::where('id', $userId)->first();
        } else {
            $student = null;
        }
        $totalStudents = User::count();

        return view('admin.students.search', compact('student','totalStudents'));
    }
}

