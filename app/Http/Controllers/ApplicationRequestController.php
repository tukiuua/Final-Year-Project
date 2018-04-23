<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ApplicationRequest;

class ApplicationRequestController extends Controller
{
    function applyRoom(Request $request) {
   

        if (Auth::check())
        {
            $id = Auth::user()->id;
            $roomId =  $request->input('room');
    
            $applicationRequest = new ApplicationRequest();
            $applicationRequest->user_id = $id;
            $applicationRequest->room_id = $roomId;
            $applicationRequest->save();
        
           return back()->with('successMsg', 'Success! Your application has been sent.');
            
        } else {

            return back()->with('unsuccessMsg', 'Please login to apply for an accomodation.');
        }
    


      
    }
}
