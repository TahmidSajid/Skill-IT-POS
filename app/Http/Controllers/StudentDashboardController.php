<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Enrollments;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function student_dashboard()
    {
        $courses = Enrollments::where('user_id',auth()->user()->id)->get();
        return view('student_dashboard',compact('courses'));
    }
}
