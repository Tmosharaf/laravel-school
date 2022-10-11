<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('search')) {
            $students = Student::with('classes')
                ->whereHas('classes', function ($query) use ($request) {
                    $query->where('name', 'like', "%$request->search%");
                })
                ->orWhere('name', 'like', "%$request->search%")
                ->orWhere('roll', 'like', "%$request->search%")
                ->orWhere('session', 'like', "%$request->search%")
                ->get();
        } else {
            $students = Student::with('classes')
                ->orderBy('roll', 'asc')
                ->paginate(4);
        }

        return view('backend.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::pluck('name', 'id');
        return view('backend.student.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO: Different Validation Request Class
        $validated = $request->validate([
            'name'  =>  ['required', 'min:3', 'max:30', 'string'],
            'classes_id'    => ['required', 'exists:classes,id'],
            'roll'  =>  [
                'required', 'max:9999', 'numeric',
                Rule::unique('students', 'roll')->where(fn ($query) => $query->where('classes_id', $request->classes_id))
            ],
            'email' =>  ['required', 'email', 'unique:students,email',],
            'phone' =>  ['required', 'regex:/[0-9]/', 'not_regex:/[a-z@!]/'],
            'age' =>  ['required', 'date_format:d/m/Y'],
            'fathers_name' =>  ['required', 'min:3', 'max:30', 'string'],
            'mothers_name' =>  ['required', 'min:3', 'max:30', 'string'],
            'address' =>  ['required', 'string', 'min:3', 'max:350'],
            'gender' =>  [
                'required', 'integer',
                Rule::in([1, 2, 3]),
            ],
            'group' =>  ['numeric', Rule::in([1, 2, 3]),],
            'session' =>  ['numeric', 'digits:4'],
            // 'password' =>  ['confirmed', 'min:4', 'max:12'],
        ]);
        $validated['password'] = Hash::make('123456'); //Default Password Is: 123456

        $student = Student::create([
            'name'  =>  $validated['name'],
            'roll'  =>  $validated['roll'],
            'email' =>  $validated['email'],
            'phone' =>  $validated['phone'],
            'age'   =>  $validated['age'],
            'gender'    =>  $validated['gender'],
            'fathers_name'  =>  $validated['fathers_name'],
            'mothers_name'  =>  $validated['mothers_name'],
            'address'   =>  $validated['address'],
            'password'  =>  $validated['password'],
            'group' =>  $validated['group'],
            'session'   =>  $validated['session'],
            'classes_id'    =>  $validated['classes_id'],
        ]);


        flasher('Student Created');

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $attendances = Attendance::where('student_roll', $student->roll)
                    // ->where('date', '<', '01-09-2022')
                    ->select(['date', 'status'])
                    ->get();
                    
        return view('backend.student.show', compact('student', 'attendances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('backend.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //TODO: Different Validation Request Class
        $validated = $request->validate([
            'name'  =>  ['required', 'min:3', 'max:30', 'string'],
            'classes_id'    => ['required', 'exists:classes,id'],
            'roll'  =>  [
                'required',
                // 'max:9999', 'numeric',
                // Rule::unique('students', 'roll')->where(fn ($query) => $query->where('classes_id', $request->classes_id))
            ],
            // 'email' =>  ['required', 'email', 'unique:students,email',],
            'phone' =>  ['required', 'regex:/[0-9]/', 'not_regex:/[a-z@!]/'],
            'age' =>  ['required', 'date_format:d/m/Y'],
            'fathers_name' =>  ['required', 'min:3', 'max:30', 'string'],
            'mothers_name' =>  ['required', 'min:3', 'max:30', 'string'],
            'address' =>  ['required', 'string', 'min:3', 'max:350'],
            'gender' =>  [
                'required', 'integer',
                Rule::in([1, 2, 3]),
            ],
            'group' =>  ['numeric', Rule::in([1, 2, 3]),],
            'session' =>  ['numeric', 'digits:4'],
            // 'password' =>  ['confirmed', 'min:4', 'max:12'],
        ]);
        // $validated['password'] = Hash::make('123456'); //Default Password Is: 123456

        $student->update([
            'name'  =>  $validated['name'],
            'roll'  =>  $validated['roll'],
            // 'email' =>  $validated['email'],
            'phone' =>  $validated['phone'],
            'age'   =>  $validated['age'],
            'gender'    =>  $validated['gender'],
            'fathers_name'  =>  $validated['fathers_name'],
            'mothers_name'  =>  $validated['mothers_name'],
            'address'   =>  $validated['address'],
            // 'password'  =>  $validated['password'],
            'group' =>  $validated['group'],
            'session'   =>  $validated['session'],
            'classes_id'    =>  $validated['classes_id'],
        ]);


        flasher('Student Updated');

        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        flasher('Student Deleted Successfully');

        return redirect()->back();
    }
}
