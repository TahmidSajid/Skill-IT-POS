<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    public function student_profile()
    {
        return view('student_profile');
    }
}
