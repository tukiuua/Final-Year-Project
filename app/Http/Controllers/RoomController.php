<?php
namespace App\Http\Controllers;
use App\Room;
use App\Accomodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
   
    public function index(){

        $rooms = Room::all();

        return view('applyAccomodation', compact('rooms'));
        
    }

    public function getRooms($accom) {
        $accomodation =  Accomodation::find($accom);
        $rooms= $accomodation->rooms;
        return $rooms;

    }


    function listRoom(Request $request) {
   
        $roomName =  $request->input('roomName');
        $roomType =  $request->input('roomType');
        $description =  $request->input('description');
        $price =  $request->input('price');
        $tenancyLength =  $request->input('tenancyLength');
        $startDate =  $request->input('startDate');
        $totalRooms =  $request->input('totalRooms');
        $accommID =  $request->input('accommID');


        $room = new Room();
        $room->room_name = $roomName;
        $room->room_type = $roomType;
        $room->description = $description;
        $room->price = $price;
        $room->tenancy_length = $tenancyLength;
        $room->start_date = $startDate;
        $room->total_rooms = $totalRooms;
        $room->accomodation_id = $accommID;
        $room->save();
    
        return back()->with('successMsg', 'Success! room has been listed.');

    }

    function removeRoom(Request $request) {
   

        if (Auth::check())
        {
            $id = Auth::user()->id;
            $roomId =  $request->input('room');
    
            $room = Room::find($roomId);
            $room->delete();  
        
           return back()->with('successMsg', 'Success! room removed.');
            
        } else {

            return back()->with('unsuccessMsg', 'Please login to apply for an accomodation.');
        }
    
    }
            

}
