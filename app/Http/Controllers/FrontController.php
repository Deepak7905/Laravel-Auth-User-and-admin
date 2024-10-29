<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class FrontController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->usertype !== 'user') {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }

        return view('front.pages.index'); 
    }
}
