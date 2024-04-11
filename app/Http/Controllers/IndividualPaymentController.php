<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Payments;
use App\Models\User;
use Illuminate\Http\Request;

class IndividualPaymentController extends Controller
{
    public function view($courseId,$studentId){

        $payments = Payments::where('user_id',$studentId)->where('course_id',$courseId)->get();
        $studentInfo = User::where('id',$studentId)->first();
        $courseInfo = Courses::where('id',$courseId)->first();
        return view('individual_payment',compact('courseId','courseId','payments','studentInfo','courseInfo'));
    }
}
