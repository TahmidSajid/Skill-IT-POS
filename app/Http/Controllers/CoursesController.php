<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function view(){
        return view('courses');
    }
}
