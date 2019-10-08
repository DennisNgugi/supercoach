<?php

namespace App\Http\Controllers;
use App\Http\Resources\VehicleCollection;
use DB;
use App\Vehicle;
use App\Member;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prop = DB::table('vehicles')
      ->join('members', 'members.id', '=', 'vehicles.member_id')->

      select('vehicles.*','members.name')
      ->where('vehicles.status','Active')
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

          'registration_no' => 'required',
          'member_id' => 'required',

        ]);
          $var = new Vehicle;

          $var->registration_no = $request->registration_no;
          $var->member_id = $request->member_id;
          $var->registration_date =$request->registration_date;
          $var->save();

        return response()->json(['success' => 'Vehicle Added'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
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
       $prop =  Vehicle::with('member')->get()->find($id);
        return response()->json($prop);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
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
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $prop = Vehicle::where('id',$id)->update(['status' => 'Inactive']);

            return response()->json($prop);
    }
}
