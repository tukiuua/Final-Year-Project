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

    public function searchAccomodation(Request $request){
        $query = $request->input('query');
        $accom= \App\Accomodation::where('accomodation_name', 'LIKE', '%' . $query . '%')
                                    ->orWhere('address', 'LIKE', '%' . $query . '%')
                                    ->get();

        if($accom){
            return view('searchAccomodation')->withDetails($accom)->withQuery($query);
        }
        return view('searchAccomodation')->withMessage("No accomodations found");

       
    }
         
    
}
