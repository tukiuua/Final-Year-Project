<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\ApplicationRequest;
use App\Room;
class ApplicationRequestController extends Controller
{
    function applyRoom(Request $request) {
   

        if (Auth::check())
        {
            $id = Auth::user()->id;
            $roomId =  $request->input('room');

            $exists = DB::table('application_requests')->where('user_id', $id)->first();

            if($exists){
                return back()->with('unsuccessMsg', 'You have already applied, please contact Administrator for more info');
            } else {
    
                $applicationRequest = new ApplicationRequest();
                $applicationRequest->user_id = $id;
                $applicationRequest->room_id = $roomId;
                $applicationRequest->save();
            
                return back()->with('successMsg', 'Success! Your application has been sent. Your Application ID is:' .  $applicationRequest->id .'');

            }
            
        } else {

            return back()->with('unsuccessMsg', 'Please login to apply for an accomodation.');
        }


    //     if(isset($status->user_id) and      isset($request->product_id))
    //     {
    //            Return to already added page
    //     }
    //    else
    //    {
    //            Return to successfully added page
    //    }
      
    }

    function getAllRequests(){

        $appRequests = DB::table('users')
            ->join('application_requests', 'users.id', '=', 'application_requests.user_id')
            ->select('users.name', 'users.surname', 'users.studentID', 'application_requests.id', 'application_requests.room_id', 'application_requests.approved')
            ->get();

        return view('viewAppRequests', compact('appRequests'));

    }

    function getUserRequest(){
        $userId = Auth::user()->id;

        $appRequests = DB::table('users')
            ->join('application_requests', 'users.id', '=', 'application_requests.user_id')
            ->select('users.name', 'users.surname', 'users.studentID', 'application_requests.id', 'application_requests.approved')
            ->where('application_requests.user_id', '=', $userId)
            ->get();
            return view('checkStatus', compact('appRequests'));

    }

    function approveRoom($id){
            //update application request to approved
            DB::table('application_requests')
            ->where('id', $id)
            ->update(['approved' => 1]);

            //retrieve roomID
            $roomId = DB::table('application_requests')
            ->where('id', $id)
            ->get();

          
            //make the user an owner of a room
            $userId = Auth::user()->id;
            DB::table('owns')->insert(
                ['user_id' => $userId, 'room_id' => $roomId[0]->room_id]
            );

            //update room availibility
            Room::find($roomId[0]->room_id)->decrement('total_rooms');

     
            return back()->with('successMsg', 'Success! Request has been approved');

    }

    function rejectRoom($id){

        DB::table('application_requests')
        ->where('id', $id)
        ->update(['approved' => 0]);

        return back()->with('successMsg', 'Success! Request has been rejected');

}
}
