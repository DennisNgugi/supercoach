<?php

namespace App\Http\Controllers;
use App\Http\Resources\MemberCollection;
use App\Member;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Share;
use App\Loan;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return new MemberCollection(Member::where('status' ,'=','Active')->get());

    }

    public function membershares($id){
      $prop = DB::table('shares')
    ->join('members', 'members.id', '=', 'shares.member_id')
    ->select('shares.*','members.name')
    ->where('shares.member_id',$id)
    ->orderBy('shares.created_at','DESC')
    ->get();
      return response()->json($prop);
    }
    public function dividends($id){
        $currentYear = date('Y');

        $prop = DB::table('shares')
       ->where('member_id',$id)
      ->whereRaw('YEAR(payment_date) = ?',[$currentYear])
      ->sum('amount');

      return response()->json($prop);

    }
    public function monthlydividends($id){
      $currentYear = date('Y');
      $prop = DB::table('shares')
       ->where('member_id',$id)
    ->whereRaw('YEAR(payment_date) = ?',[$currentYear])
    ->select(DB::raw('SUM(amount) as total_amount,MONTHNAME( payment_date ) as month'))
    ->groupBy(DB::raw('MONTHNAME(payment_date) ASC'))->get();

    return response()->json($prop);
    }
    public function memberwithdrawnshares($id){
      $prop = DB::table('withdraw_shares')
    ->join('members', 'members.id', '=', 'withdraw_shares.member_id')
    ->select('withdraw_shares.*','members.name')
    ->where('withdraw_shares.member_id',$id)
    ->orderBy('withdraw_shares.created_at','DESC')
    ->get();
      return response()->json($prop);
    }
      public function memberamortizationschedule($id){
        $prop = DB::table('amortizations')
        ->join('loans','loans.id','=','amortizations.loan_id')
        ->select('amortizations.*','loans.loan_id','loans.amount','loans.interest_rate','loans.duration','loans.date')
        ->where('amortizations.loan_id',$id)
        ->get();
        //$prop = Loan::with('amortization')->get();

        return response()->json($prop);
      }

    public function memberloan($id){
      $prop = DB::table('loans')
    ->join('members', 'members.id', '=', 'loans.member_id')
      ->select('loans.*','members.name')
    ->where('loans.member_id',$id)
    ->where('loans.status','Active')
    ->get();
      return response()->json($prop);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
          'name' => 'required|unique:members',
          'national_id' => 'required|unique:members',
          'mobile' => 'required|unique:members',
          'registration_date' => 'required|date',
          'number' => 'required|unique:members'

        ]);

        $prop = new Member();
        $prop->name = $request->name;
        $prop->number = $request->number;
        $prop->email = $request->email;

        $prop->mobile = $request->mobile;

        $prop->national_id = $request->national_id;

        $prop->registration_date = $request->registration_date;

        $prop->save();

        return response()->json(['success' => 'Member Added'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $post = DB::table('members')
        // ->join('vehicles', 'vehicles.member_id', '=', 'members.id')
        // ->select('members.*','vehicles.registration_no')
        // ->where('members.id','=',$id)->get();
        //
        //   return response()->json($post);
      $prop =  Member::with('vehicle')->get()->find($id);
       return response()->json($prop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $prop = Member::find($id);
      return response()->json($prop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $prop = Member::find($id);

        $prop->name = $request->name;
        $prop->number = $request->number;
        $prop->email = $request->email;

        $prop->mobile = $request->mobile;

        $prop->national_id = $request->national_id;

        $prop->registration_date = $request->registration_date;

        $prop->save();

     return response()->json('successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $prop = Member::where('id',$id)->update(['status' => 'Inactive']);

            return response()->json($prop);
        }
}
