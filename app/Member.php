<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    public function vehicle(){
      return $this->hasMany(Vehicle::class,'member_id');
    }
}
