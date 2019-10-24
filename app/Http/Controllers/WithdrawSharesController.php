<?php

namespace App\Http\Controllers;
//use App\Http\Resources\WithdrawSharesCollection;
use DB;
use App\WithdrawShares;
use Illuminate\Http\Request;

class WithdrawSharesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


    }
    public function withdrawalshares(){
      $prop = DB::table('withdraw_shares')
    ->join('members', 'members.id', '=', 'withdraw_shares.member_id')
    ->select('withdraw_shares.*','members.name','members.number')
    ->orderBy('withdraw_shares.created_at','DESC')
    ->get();
        return response()->json($prop);
    }

    // public function membershares(){
    //   $prop = DB::table('members')
    //   ->join('members', 'members.id', '=', 'shares.member_id')
    //
    //   ->select('members.id','members.name', \DB::raw('sum(`shares.amount`) as `amount`'))
    //   ->groupBy('members.id');
    //
    // return response()->json($prop);
    // }

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

          'amount' => 'required|integer',
          'payment_date' => 'required'

        ]);
          $var = new WithdrawShares;

          $var->member_id = $request->member_id;
          $var->amount = $request->amount;
          $var->date =$request->payment_date;
          $var->save();

          return response()->json(['success' => 'WithdrawSharess Added'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WithdrawShares  $WithdrawShares
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WithdrawShares  $WithdrawShares
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WithdrawShares  $WithdrawShares
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WithdrawShares  $WithdrawShares
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $prop = WithdrawShares::find($id);
        $prop->delete();

        return response()->json(['success' => 'WithdrawShares Deleted'], 200);

    }
}
