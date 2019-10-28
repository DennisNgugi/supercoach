<?php

namespace App\Http\Controllers;
use DB;
use App\Guarantor;
use Illuminate\Http\Request;

class GuarantorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
          $prop = DB::table('guarantors')
          ->join('members','members.id','=','guarantors.member_id')
          ->select('guarantors.*','members.name','members.number')
          ->where('guarantors.loan_id',$id)
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
    public function store(Request $request,$id)
    {
        //
        $this->validate($request,[
          'guarantor' => 'required',
          'amount' => 'required',
          'date'=>'required'
        ]);
        $prop = new Guarantor;
        $prop->member_id = $request->guarantor;
        $prop->loan_id = $id;
        $prop->amount = $request->amount;
        $prop->date = $request->date;

        $prop->save();
        return response()->json('Guarantor succesfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guarantor  $guarantor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guarantor  $guarantor
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
     * @param  \App\Guarantor  $guarantor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guarantor  $guarantor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $prop = Guarantor::find($id);
          $prop->delete();
        return response()->json($prop);
    }
}
