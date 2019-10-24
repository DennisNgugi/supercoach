<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    public function vehicle(){
      return $this->hasMany(Vehicle::class,'member_id');
    }
    public function share(){
      return $this->hasMany(Share::class);

    }
    public function withdrawshare(){
      return $this->hasMany(WithdrawShares::class);

    }
}
