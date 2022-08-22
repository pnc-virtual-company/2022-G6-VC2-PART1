<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllLeave()
    {
        // return  Leave::with("students")->latest()->get();
        return Leave::with("students")->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createLeave(Request $request)
    {
        $request-> validate([
            'reason'=> 'required|min:5',
        ]);
        $leave = new Leave();
        $leave -> student_id = $request ->student_id;
        $leave -> start_date = $request -> start_date;
        $leave-> end_date = $request -> end_date;
        $leave -> duration = $request -> duration;
        $leave -> reason = $request -> reason;
        $leave -> leave_type = $request -> leave_type;
        $leave -> status =$request -> status;

        $leave -> save();
        return response()->json($leave);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     return Leave::find($id);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function updateLeave(Request $request, $id)
    // {
    //     $request-> validate([

    //         'reason'=> 'required|min:5',
    //     ]);

    //     $leave = Leave::findOrfail($id);
    //     $leave -> student_id = $request ->student_id;
    //     $leave -> start_date = $request -> start_date;
    //     $leave-> end_date = $request -> end_date;
    //     $leave -> duration = $request -> duration;
    //     $leave -> reason = $request -> reason;
    //     $leave -> leave_type = $request -> leave_type;
    //     $leave -> status =$request -> status;
    //     $leave -> save();
    //     // return response()->json($leave);
    //     return response()->json(['message' => 'leave created successfully', 'data' => $leave], 201);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function deleteLeave($id)
    // {
    //     $isDelete = Leave::destroy($id);
    //   if($isDelete == 1){
    //     return response()->json(['message'=>'delete'],200);
    //   }else{
    //     return response()->json(['message'=> 'ID Not Found'], 200);
    //   }
    // }

    /**
     * Get data with foreign key
     * return all data that has this foreign key
     */
    public function getAllLeaveWithUser($id)
    {
        return Leave::where('student_id',"=", $id)->get();
    }
}

