<?php

namespace App\Http\Controllers;

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
        // nanti di if else dan return view na sesuai role
        /*
        if (auth()->role == 'admin'){
            return view ('admin/dashboard);
        } else if ()
        */
        return view('/admin/dashboard');
    }
}
