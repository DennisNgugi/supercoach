<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    //
    public function amortization(){
      return $this->hasMany(Amortization::class);
    }
}
