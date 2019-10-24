<?php

namespace App\Http\Controllers;
use App\Http\Resources\MemberCollection;
use App\Member;
use Illuminate\Http\Request;
use Image;
use DB;
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
    public function memberwithdrawnshares($id){
      $prop = DB::table('withdraw_shares')
    ->join('members', 'members.id', '=', 'withdraw_shares.member_id')
    ->select('withdraw_shares.*','members.name')
    ->where('withdraw_shares.member_id',$id)
    ->orderBy('withdraw_shares.created_at','DESC')
    ->get();
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
          'name' => 'required',
          'national_id' => 'required',
          'mobile' => 'required',
          'registration_date' => 'required|date',
          'number' => 'required'

        ]);
        if($request->get('image'))
       {
          $image = $request->get('image');
          $filename = time().str_random(5).'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('image'))->resize(250, 250)->save(public_path('images/').$filename);
        }

        $prop = new Member();
        $prop->name = $request->name;
        $prop->number = $request->number;
        $prop->email = $request->email;

        $prop->mobile = $request->mobile;

        $prop->national_id = $request->national_id;

        $prop->image = $filename;

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
