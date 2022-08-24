<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Routine;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('class_id')) {
            $class_id = $request->class_id;
        } else {
            $class_id = []; //TODO: logged in student class name && Teacher Class Name && Admin Class One 
        }
        // dump($class_id);
        $routines = Routine::with(['subject'])
            // ->whereNotIn('day', ['Friday'])
            ->where('classes_id', $class_id)
            ->get();
        // $routines = $routines->reject(function ($value, $key) {
        //     return $value->time > '12:00';
        // });


        return view('backend.routine.index', [
            'classes'   =>  Classes::all(),
            'routines' => $routines,
            'class_id' => $class_id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //get class id from request @route
        $class_id = $request->class_id;

        //get all routine By Class Id
        $routines = Routine::where('classes_id', $class_id)
            ->orderBy('time', 'ASC')
            ->get();

        //filter by day from Datbase [Day] Column
        $routines = $routines->map(function ($item) {
            //item day all are in a string format, so first convert it into an array.
            $days = str_replace(['"', '[', ']'], '', $item->day);
            $days = explode(',', $days);
            //check day column from database with today
            if (in_array(strtolower(date('l')), $days)) {
                return $item;
            }
        });
        $routines =  $routines->filter(); //remove null item from colection

        $class = Classes::where('id', $class_id)->first();
        $subjects = Subject::where('classes_id', $class_id)->get();
        $teachers = Teacher::all();
        // dd($routine); 
        return view(
            'backend.routine.create',
            compact('class', 'routines', 'subjects', 'teachers')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(collect($request->day));
        $validated = $request->validate([
            'classes_id' => ['required', 'integer', 'exists:classes,id',],
            'subject_id' => [
                'required',
                'integer',
                'exists:subjects,id',
                Rule::exists('subjects', 'id')->where(function ($query) use ($request) {
                    return $query->where('classes_id', $request->classes_id);
                })
            ],
            'teacher_id' => ['required', 'integer', 'exists:teachers,id'],
            'day' => ['required',],
            'time' => ['required', 'date_format:H:i'],
        ]);
        $validated['day'] = collect($validated['day']);

        Routine::create($validated);
        flasher('Routine Class Created');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function show($class_id)
    {
        //get the class name
        $class = Classes::where('id', $class_id)->first('name');

        $routines = Routine::where('classes_id', $class_id)
        ->with('subject', 'teacher')
        ->orderBy('time', 'ASC')
        ->get();
        return view('backend.routine.show', compact('routines', 'class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function edit(Routine $routine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Routine $routine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Routine $routine)
    {
        $routine->delete();

        flasher('Routine Single Class Deleted Successfully', 'warning');

        return back();
    }
}
