<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomRating extends Model
{
    //
    protected $table = 'rooms_ratings';
    public function room(){
        return $this->BelongsTo(Room::class);
    }
}