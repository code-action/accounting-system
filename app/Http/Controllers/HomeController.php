<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(is_null(auth()->user()->email_verified_at)){
            return redirect('profile')->with('success','Porfavor cambie su contraseña de acceso.');
        }
        return view('dashboard');
    }
}