<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accomodation;


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
    
}
