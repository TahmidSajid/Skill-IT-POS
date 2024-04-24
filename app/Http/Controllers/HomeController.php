<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Courses;
use App\Models\Enrollments;
use App\Models\Payments;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role != 'admin') {
            return redirect(route('profile'));
        }
        $costs = Courses::select('cost')->get();
        $total_cost = 0;
        foreach ($costs as $key => $cost) {
            $total_cost = $cost->cost + $total_cost;
        }

        $paid_payments = Payments::select('payment')->where('status','paid')->get();
        $total_paid = 0 ;
        foreach ($paid_payments as $key => $payment) {
            $total_paid = $payment->payment + $total_paid;
        }

        $due_payments = Payments::select('payment')->where('status','unpaid')->get();
        $total_due = 0 ;
        foreach ($due_payments as $key => $payment) {
            $total_due = $payment->payment + $total_due;
        }


        $total_loss = 0;
        $total_gain = 0;
        if ($total_cost>$total_paid) {
            $total_loss = $total_cost-$total_paid;
        }
        else{
            $total_gain = $total_paid-$total_cost;
        }

        $total_student = User::where('role','student')->count();
        $active_student = User::where('role','student')->where('status','active')->count();
        $enrolled_student = Enrollments::select('user_id')->distinct()->count();
        $launched_course = Courses::count();
        return view('dashboard',compact('total_cost','total_paid','total_loss','total_gain','total_due','total_student','active_student','enrolled_student','launched_course'));
    }
}
