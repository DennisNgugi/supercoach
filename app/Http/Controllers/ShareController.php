<?php

namespace App\Http\Controllers;
use App\Http\Resources\ShareCollection;
use DB;
use App\Share;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prop = DB::table('shares')
      ->join('members', 'members.id', '=', 'shares.member_id')
        ->join('vehicles', 'vehicles.id', '=', 'shares.vehicle_id')->
      select('shares.*','members.name','vehicles.registration_no')
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

          'vehicle_id' => 'required',
          'amount' => 'required|integer',
          'payment_date' => 'required'

        ]);
          $var = new Share;

          $var->vehicle_id = $request->vehicle_id;
            $var->member_id = $request->member_id;
          $var->amount = $request->amount;
          $var->payment_date =$request->payment_date;
          $var->save();

          return response()->json(['success' => 'Shares Added'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function show(Share $share)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function edit(Share $share)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Share $share)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function destroy(Share $share)
    {
        //
    }
}
