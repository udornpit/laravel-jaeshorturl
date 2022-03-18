<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function Index()
    {
        return view('admin.login');
    }

    public function Dashboard()
    {
        $urls = \AshAllenDesign\ShortURL\Models\ShortURL::latest()->get();
        return view('admin.index', ['urls' => $urls]);
    }

    public function Login(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'],
            'password' => $check['password']])) {
            return redirect()->route('admin.dashboard')->with('admmsg', 'Admin Login Successfully!');
        } else {
            return back()->with('admmsg', 'Invalid email or password!');
        }
        
    }

    public function Logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('admmsg', 'Admin Logout Successfully!');
    }
}
