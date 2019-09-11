<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    public function member(){
      return $this->belongsTo(Member::class,'member_id');
    }
}
