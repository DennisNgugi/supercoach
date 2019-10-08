<?php

namespace App\Http\Controllers;
use App\Share;
use App\Loan;
use App\Member;
use App\Vehicle;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function totalShares(){
      $sum = DB::table('shares')->sum('amount');
      return response()->json($sum);
    }


    public function totalVehicles(){
      $count = DB::table('vehicles')->count();
        return response()->json($count);
    }

    public function totalMembers(){
      $count = DB::table('members')->count();
        return response()->json($count);
    }

    public function totalLoans(){
      $sum = DB::table('loans')->sum('amount');
      return response()->json($sum);
    }
    public function month(){
      $currentMonth = date('m');

        $data = DB::table("shares")
          ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
          ->sum('amount');
          return response()->json($data);


    }
}
