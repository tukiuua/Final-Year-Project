<?php

namespace App\Http\Controllers;
use App\Http\Middleware\checkUserIsAdmin;
use Illuminate\Support\Facades\Auth;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::User()->isAdmin==0) 
        {
            return redirect('/dashboard');

        } else
        {
            return redirect('/admin/dashboard');
        }
    }


}
