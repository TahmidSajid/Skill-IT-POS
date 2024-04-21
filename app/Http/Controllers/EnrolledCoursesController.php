<?php

namespace App\Http\Controllers;

use App\Models\Enrollments;
use Illuminate\Http\Request;

class EnrolledCoursesController extends Controller
{
    public function enrolled_courses()
    {
        $enrollments = Enrollments::where('user_id',auth()->user()->id)->get();
        return view('enrolled_courses',compact('enrollments'));
    }
}
