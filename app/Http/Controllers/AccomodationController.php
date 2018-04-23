<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accomodation;
use App\Http\Middleware\checkUserIsAdmin;
use Illuminate\Support\Facades\Auth;


class AccomodationController extends Controller
{
    //

    public function index(){

        $accomodations = Accomodation::all();

        return view('viewAccomodation', compact('accomodations'));
        
    }

    public function show($id){

        $accomodation = Accomodation::find($id);

        return view ('accomodation', compact('accomodation'));

    }

    public function store(){
        
    }

    public function getAllAccomodations(){

        $accomodations = Accomodation::all();

         return view('applyAccomodation', compact('accomodations'));
    }
         
    
}
