<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(25);
        return view('backend.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = \App\Models\Classes::pluck('name', 'id');
        return view('backend.teacher.create', [
            'classes' => $classes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:teachers',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'education' => 'string|max:255',
            'experience' => 'string|max:255',
            'description' => 'string|max:255',
            'class_teacher' => 'required|string|max:255|unique:teachers,class_teacher|exists:classes,name',
        ]);

        Teacher::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            // 'image' => $request->file('image')->store('images/teacher', 'public'),//TODO:Image Upload
            'education' => $validated['education'],
            'experience' => $validated['experience'],
            'description' => $validated['description'],
            'class_teacher' => $validated['class_teacher'],
        ]);

        flasher('Teacher Created');
        
        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('backend.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('backend.teacher.edit', [
            'teacher' => $teacher,
            'classes' => Classes::select('id', 'name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        if(!$request->has('old_password')){
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'education' => 'string|max:255',
                'experience' => 'string|max:255',
                'description' => 'string|max:255',
                'class_teacher' => 'required|string|max:255|exists:classes,name',
            ]);
            dd($validated);
            $teacher->update($validated);
            return redirect()->route('teacher.index')->with('message', "Teacher Updated Successfully");
        }else{
            $validated = $request->validate([
                'old_password' => ['required', 
                    function($attribute, $value, $fail) use($teacher){
                        if (!Hash::check($value, $teacher->password)) {
                            $fail('Old Password didn\'t match');
                        }
                    }],
                'password'  => ['required', 'confirmed', 'min:6'],
            ]);

            $teacher->update($validated);
            return redirect()->route('teacher.index')->with('message', "Teacher Password Updated Successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        try {
            $teacher->delete();
            flasher('Teacher Deleted Successfully', 'info');
        } catch (\Throwable $e) {
            flasher('Cannot Delete Teacher Profile', 'warning');
        }
        
        
        return back();
    }
}
