<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Accomodation extends Model
{
    public function rooms(){

        return $this->hasMany(Room::class);
        
    }

    public function images(){

        return $this->hasMany(AccomodationImage::class);
        
    }

    public function facilities(){

        return $this->BelongsToMany(facility::class);
        
    }
   




}
