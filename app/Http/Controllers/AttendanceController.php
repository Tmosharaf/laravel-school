<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
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
    public function store(Request $request)
    {
        if ($request->has('attendance')) {
            foreach ($request->attendance as $student_roll) {
                // dump($student_roll); //Single Attendance Roll

                $attendance = Attendance::where('student_roll', $student_roll)
                    ->where('date', date('d-m-Y'))
                    ->first();
                // attendance create or update
                if ($attendance) {
                    $attendance->update([
                        'student_roll' => $student_roll,
                        'class_name'    =>  $request->class_name,
                        'date'          =>  date('d-m-Y'),
                        'status'        =>  'present',
                    ]);
                } else {
                    $attendance = new Attendance();
                    $attendance->student_roll = $student_roll;
                    $attendance->class_name = $request->class_name;
                    $attendance->date = date('d-m-Y');
                    $attendance->status = 'present';

                    $attendance->save();
                }
            }
        }
        return back()->with('success', 'Attendance created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
