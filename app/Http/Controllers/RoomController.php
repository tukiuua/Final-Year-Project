<?php
namespace App\Http\Controllers;
use App\Room;
use App\Accomodation;
use Illuminate\Http\Request;

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


}
