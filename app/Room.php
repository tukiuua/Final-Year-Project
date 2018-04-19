<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function accomodation(){

        return $this->BelongsTo(Accomodation::class);
        
    }
}
