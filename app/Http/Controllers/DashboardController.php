<?php

namespace App\Http\Controllers;
use App\Share;
use App\Loan;
use App\Member;
use App\Vehicle;
use DB;
use PDF;
use Carbon\Carbon;

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
    public function dashboardShares(){
      $prop = DB::table('shares')
    ->join('members', 'members.id', '=', 'shares.member_id')
    ->select('shares.*','members.name')
    ->orderBy('shares.created_at','DESC')
    ->latest()->take(5)->get();

      return response()->json($prop);

    }
    public function dashboardLoans(){
      $prop = DB::table('loans')
    ->join('members', 'members.id', '=', 'loans.member_id')
      ->select('loans.*','members.name')
      ->where('loans.status','Active')
      ->orderBy('loans.created_at','DESC')
    ->latest()->take(5)->get();
      return response()->json($prop);

    }

    public function monthly(){
        $currentYear = date('Y');
        $prop = DB::table('shares')
      ->whereRaw('YEAR(created_at) = ?',[$currentYear])
      ->select(DB::raw('SUM(amount) as total_amount,MONTHNAME( created_at ) as month'))
    //  ->orderBy(DB::raw('MONTHNAME(created_at) ASC'))
      ->groupBy(DB::raw('MONTHNAME(created_at) ASC'))->get();

      return response()->json($prop);

    }

    public function downloadShares(){
      $date = Carbon::now();
      $sum = Share::with('member')->sum('amount');
      $show = Share::with('member')->get();
      $pdf = PDF::loadView('sharespdf', compact('show','sum'))->setPaper('a4', 'landscape');
      $download = 'Shares report'.'-'.$date.'.'.'pdf';
      return $pdf->download($download);
    }
    public function individualShares($id){
      $date = Carbon::now();
      $member = Member::find($id);
      $name = $member->name;
      $show  = DB::table('shares')
      ->join('members', 'members.id', '=', 'shares.member_id')
      ->select('shares.*','members.name','members.number')
      ->where('shares.member_id',$id)
      ->orderBy('shares.created_at','DESC')
      ->get();
      $sum  = DB::table('shares')
      ->join('members', 'members.id', '=', 'shares.member_id')
      ->where('shares.member_id',$id)
      ->sum('amount');

       $pdf = PDF::loadView('membersharespdf', compact('show','sum'))->setPaper('a4','potrait');
        $download = $name.'-'.'shares'.'-'.$date.'.'.'pdf';
        return $pdf->download($download);
    }
    public function monthlySharesDownload(){
      $currentYear = date('Y');
      $date = Carbon::now();
      $show = DB::table('shares')
    ->whereRaw('YEAR(created_at) = ?',[$currentYear])
    ->select(DB::raw('SUM(amount) as total_amount,MONTHNAME( created_at ) as month'))
  //  ->orderBy(DB::raw('MONTHNAME(created_at) ASC'))
    ->groupBy(DB::raw('MONTHNAME(created_at) ASC'))->get();

    $pdf = PDF::loadView('monthlysharespdf', compact('show'))->setPaper('a4','potrait');
     $download = 'Monthly report'.'-'.$date.'.'.'pdf';
     return $pdf->download($download);
    }
}
