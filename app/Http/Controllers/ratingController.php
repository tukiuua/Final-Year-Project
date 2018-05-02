<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ratingController extends Controller
{

    function rateRoom($rating){

        //get current user's ID
        $userId = Auth::user()->id;

        //get owned room ID
        $ownedRoom = DB::table('owns')
        ->join('rooms', 'owns.room_id', '=', 'rooms.id')
        ->join('users', 'owns.user_id', '=', 'users.id')
        ->select('rooms.id')
        ->get();
        $roomId =  $ownedRoom[0]->id;

        DB::table('rooms_ratings')->insert(
            ['room_id' => $roomId, 'rating' => $rating, 'user_id' => $userId]
    
        );

        return back()->with('successMsg', 'Success! rating has been added');

    }
}
