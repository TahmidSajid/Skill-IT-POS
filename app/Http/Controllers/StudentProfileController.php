<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    public function student_profile()
    {
        if (!Auth::check()) {
            return redirect(route('student_login_page'));
        }
        return view('student_profile');
    }
}
