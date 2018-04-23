<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationRequest extends Model
{
    public function user(){

        return $this->BelongsTo(user::class);
        
    }

}
