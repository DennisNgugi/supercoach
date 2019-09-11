<?php

namespace App\Http\Controllers;
use App\Loan;
use App\LoanPayment;
use Illuminate\Http\Request;
use DB;

class LoanPaymentController extends Controller
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

    public function loan_pay_view($id){
  //  $prop = Loan::find($id);
      $prop = DB::table('loans')
            ->select('loans.*')
            ->where('loans.loan_id',$id);
      return response()->json($prop);
    }

    public function payloan(Request $request ,$id){
      $request->validate([
        'amt' => 'required|integer',
      ]);

      $prop = Loan::find($id);
      $loan = new LoanPayment;
      $amount_paid = $request->amt;
    //  $principle = $prop->amount;
      $loan->loan_id = $id;
      $loan->principle = $principle;
      $loan->amount_paid = $amount_paid;
      $loan->interest = $prop->interest;
      $loan->balance = $principle-$amount_paid;
      return response()->json($prop);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LoanPayment  $loanPayment
     * @return \Illuminate\Http\Response
     */
    public function show(LoanPayment $loanPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LoanPayment  $loanPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanPayment $loanPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoanPayment  $loanPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanPayment $loanPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoanPayment  $loanPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanPayment $loanPayment)
    {
        //
    }
}
