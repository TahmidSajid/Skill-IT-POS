<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentsController extends Controller
{

    public function view(){
        if (!Auth::check()) {
            return redirect(route('login'));
        }
        return view('enrollment');
    }
}
