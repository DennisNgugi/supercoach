<?php

namespace App\Http\Controllers;
use App\Http\Resources\LoanCollection;
use DB;
use App\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prop = DB::table('loans')
      ->join('members', 'members.id', '=', 'loans.member_id')
        ->select('loans.*','members.name')
        ->where('loans.status','Active')
        ->orderBy('loans.created_at','DESC')
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

      $request->validate([
        'amount' => 'required|integer',
        'rate' => 'required|integer',
        'date'=>'required|date',
        'duration'=> 'required|integer',
        'member' => 'required',

      ]);
        $var = new Loan;
        $prefix = 'SPCH';
        $var->loan_id = $prefix.uniqid();
        $var->member_id = $request->member;
        $var->date =$request->date;
        $var->amount =$request->amount;
        $var->interest_rate =$request->rate;
        $var->duration = $request->duration;
        $var->save();
        return response()->json(['success'=>'Loan added successfully.']);

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
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
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $prop = Loan::where('id',$id)->update(['status' => 'Inactive']);

            return response()->json($prop);
    }
}
