<?php

namespace App\Http\Controllers;

use App\Models\Enrollments;
use App\Models\Payments;
use Illuminate\Http\Request;

class EnrolledCoursesController extends Controller
{
    public function enrolled_courses()
    {
        $total_payments = Payments::where('user_id',auth()->user()->id)->count();
        $complete_payments = Payments::where('user_id',auth()->user()->id)->where('status','paid')->count();
        $enrollments = Enrollments::where('user_id',auth()->user()->id)->get();
        $total_enrollment = Enrollments::where('user_id',auth()->user()->id)->count();
        $total_paid = Payments::select('payment')->where('user_id',auth()->user()->id)->where('status','paid')->get();
        $total_money = 0;
        foreach ($total_paid as $key => $value) {
            $total_money = $total_money+$value->payment;
        }
        return view('enrolled_courses',compact('enrollments','total_payments','complete_payments','total_money','total_enrollment'));
    }
}
