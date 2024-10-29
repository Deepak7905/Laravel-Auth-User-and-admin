<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BackendController extends Controller
{
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->usertype !== 'admin') {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }

        return view('backend.pages.dashboard'); 
    }
}
