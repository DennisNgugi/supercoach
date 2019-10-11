<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    //
    public function member(){
      return $this->belongsTo(Member::class);

    }
}
