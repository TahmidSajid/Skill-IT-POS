<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function view(){
        if (!Auth::check()) {
            return redirect(route('login'));
        }
        return view('students');
    }

}
