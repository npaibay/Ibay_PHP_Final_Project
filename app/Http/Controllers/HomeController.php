<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        return view('home.index', [
            'username' => session('username'),
            'account_type' => session('account_type'),
        ]);
    }
}