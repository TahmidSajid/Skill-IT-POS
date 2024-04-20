<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{
    public function student_login_page()
    {
        return view('student_login');
    }
    public function student_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'student'])){
            User::where('id',auth()->user()->id)->update([
                'status' => 'active',
            ]);
            return redirect(route('student_dashboard'));
        }
        else{
            return back()->with('credi_error','credential doesnot match');
        }
    }
}
