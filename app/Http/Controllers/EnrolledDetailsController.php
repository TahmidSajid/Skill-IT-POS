<?php

namespace App\Http\Controllers;

use App\Models\Enrollments;
use App\Models\Payments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EnrolledDetailsController extends Controller
{
    public function enrolled_details($enrollment_id)
    {
        if (!Auth::check()) {
            return redirect(route('student_login_page'));
        }
        $enrollment = Enrollments::where('id',$enrollment_id)->first();
        $payments = Payments::where('user_id',auth()->user()->id)->where('course_id',$enrollment->course_id)->get();
        return view('enrolled_details',compact('enrollment','payments'));
    }
}
