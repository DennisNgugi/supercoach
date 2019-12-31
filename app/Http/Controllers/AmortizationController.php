<?php

namespace App\Http\Controllers;

use App\Amortization;
use Excel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use DB;
use App\Loan;
class AmortizationController extends Controller
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
    public function store(Request $request, $id)
    {
        //
        $this->validate($request,[
          'file' => 'required'
        ]);

        $loan = Loan::find($id);
        $path = $request->file('file')->getRealPath();

        $data = Excel::load($path)->get();

        if($data->count() > 0){
          foreach($data->toArray() as $row){
            // print_r(Carbon::parse($value['payment'])->toDateTimeString());
          //  $insert_data[] = array(
            $amort = new Amortization;
              $amort->loan_id = $loan->id;
              if($amort->instalment == '' ){
                $amort->instalment = '';
              }else{
                $amort->instalment = Carbon::parse($row['instalment'])->toDateTimeString();
              }
              if($amort->payment_date == '' ){
                $amort->payment_date = '';
              }else{
                $amort->payment_date = Carbon::parse($row['payment'])->toDateTimeString();
              }
              $amort->principal = $row['principal'];
              $amort->interest = $row['interest'];
              $amort->penalty = $row['penalty'];
              $amort->totals = $row['totals'];
              $amort->paid_amount = $row['paid'];
              $amort->loan_balance = $row['balance'];

              $amort->save();
            //);
            //foreach($value as $row){
              //print_r(Carbon::parse($row['payment'])->toDateTimeString());
            //  print_r(Carbon::parse($row['payment']['date']));
              // $insert_data[] = array(
              //   'instalment' => $row['instalment'],
              //   'payment_date' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['payment'])),
              //   'principal' => $row['principal'],
              //   'interest' => $row['interest'],
              //   'penalty' => $row['penalty'],
              //   'totals' => $row['totals'],
              //   'paid_amount' => $row['paid'],
              //   'loan_balance' => $row['balance'],
              // );

          //  }
          }
          // if(!empty($insert_data))
          // {
          //   DB::table('amortizations')->insert($insert_data);
          // }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Amortization  $amortization
     * @return \Illuminate\Http\Response
     */
    public function show(Amortization $amortization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Amortization  $amortization
     * @return \Illuminate\Http\Response
     */
    public function edit(Amortization $amortization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Amortization  $amortization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amortization $amortization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Amortization  $amortization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amortization $amortization)
    {
        //
    }
}
