<?php

namespace App\Http\Controllers;
use App\Share;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function filter(Request $request){

        $id = $request->get('member_id');
        return Share::where('member_id',$id)->get();

    }
}
