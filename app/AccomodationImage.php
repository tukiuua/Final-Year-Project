<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccomodationImage extends Model
{
    public function accomodation(){

        return $this->BelongsTo(Accomodation::class);
        
    }
}
