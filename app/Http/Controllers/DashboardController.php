<?php

namespace App\Http\Controllers;
use App\Share;
use App\Loan;
use App\Member;
use App\Vehicle;
use App\WithdrawShares;
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
          ->whereRaw('MONTH(payment_date) = ?',[$currentMonth])
          ->sum('amount');
          return response()->json($data);


    }


    public function dashboardShares(){
      $prop = DB::table('shares')
    ->join('members', 'members.id', '=', 'shares.member_id')
    ->select('shares.*','members.name')
    ->orderBy('shares.payment_date','DESC')
    ->latest()->take(5)->get();

      return response()->json($prop);

    }
    public function dashboardWithdrawalShares(){
      $prop = DB::table('withdraw_shares')
    ->join('members', 'members.id', '=', 'withdraw_shares.member_id')
    ->select('withdraw_shares.*','members.name')
    ->orderBy('withdraw_shares.date','DESC')
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
      ->whereRaw('YEAR(payment_date) = ?',[$currentYear])
      ->select(DB::raw('SUM(amount) as total_amount,MONTHNAME( payment_date ) as month'))
      ->groupBy(DB::raw('MONTHNAME(payment_date) ASC'))->get();

      return response()->json($prop);

    }

    public function downloadShares(){
      $date = Carbon::now();
      $sum = Share::with('member')->sum('amount');
      $show = Share::with('member')->get();
      $pdf = PDF::loadView('sharespdf', compact('show','sum'))->setPaper('a4', 'landscape');
      $download = 'Shares report'.'-'.$date.'.'.'pdf';
      //$password = '123';
      //$pdf->setEncryption($password);
      return $pdf->download($download);
    }
    public function downloadWithdrawalShares(){
      $date = Carbon::now();
      $sum = WithdrawShares::with('member')->sum('amount');
      $show = WithdrawShares::with('member')->get();
      $pdf = PDF::loadView('shareswithdrawalpdf', compact('show','sum'))->setPaper('a4', 'landscape');
      $download = 'Shares withdrawal Full report'.'-'.$date.'.'.'pdf';
      //$password = '123';
      //$pdf->setEncryption($password);
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
    public function individualLoan($id,$loanID){
      $date = Carbon::now();
      $member = Member::find($id);
      $name = $member->name;
      $show  = DB::table('loans')
      ->join('members', 'members.id', '=', 'loans.member_id')
      ->select('loans.*','members.name','members.number')
      ->where('loans.member_id',$id)
      //->orderBy('loans.created_at','DESC')
      ->get();

      $amortization = DB::table('amortizations')
      ->join('loans', 'loans.id', '=', 'amortizations.loan_id')
      ->select('amortizations.*')
      ->where('amortizations.loan_id',$loanID)
      //->orderBy('loans.created_at','DESC')
      ->get();

      $guarantors = DB::table('guarantors')
      ->join('members','members.id','=','guarantors.member_id')
      ->join('loans','loans.id','=','guarantors.loan_id')
      ->select('members.name','members.number','guarantors.*')
      ->where('guarantors.loan_id',$loanID)
      ->where('guarantors.member_id',$id)
      ->get();
      // $sum  = DB::table('shares')
      // ->join('members', 'members.id', '=', 'shares.member_id')
      // ->where('shares.member_id',$id)
      // ->sum('amount');

       $pdf = PDF::loadView('memberloanpdf', compact('show','amortization','guarantors'))->setPaper('a4','potrait');
        $download = $name.'-'.'loan'.'-'.$date.'.'.'pdf';
        return $pdf->download($download);
    }

    public function individualWithdrawnShares($id){
      $date = Carbon::now();
      $member = Member::find($id);
      $name = $member->name;
      $show  = DB::table('withdraw_shares')
      ->join('members', 'members.id', '=', 'withdraw_shares.member_id')
      ->select('withdraw_shares.*','members.name','members.number')
      ->where('withdraw_shares.member_id',$id)
      ->orderBy('withdraw_shares.created_at','DESC')
      ->get();
      $sum  = DB::table('withdraw_shares')
      ->join('members', 'members.id', '=', 'withdraw_shares.member_id')
      ->where('withdraw_shares.member_id',$id)
      ->sum('amount');

       $pdf = PDF::loadView('memberwithdrawalsharespdf', compact('show','sum'))->setPaper('a4','potrait');
        $download = $name.'-'.'withdrawal'.'shares'.'report'.'-'.$date.'.'.'pdf';
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
