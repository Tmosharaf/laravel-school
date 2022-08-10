<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Stringable;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $classes = Classes::with('students')
                    ->orderBy('id', 'asc')
                    ->paginate(12);
        return view('backend.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class_placeholder = Classes::orderBy('created_at', 'desc')->first();
        $lastItem_class_name = ucwords($class_placeholder->name);

        

        switch ($lastItem_class_name) {
            case 'one':
                $placeholder_item = 'Two';
                break;
            
            case 'Two':
                $placeholder_item = 'Three';
                break;
            
            case 'Three':
                $placeholder_item = 'Four';
                break;
            
            case 'Four':
                $placeholder_item = 'Five';
                break;
            
            case 'Five':
                $placeholder_item = 'Six';
                break;
            
            case 'Six':
                $placeholder_item = 'Seven';
                break;
            
            case 'Seven':
                $placeholder_item = 'Eight';
                break;
                
            case 'Eight':
                $placeholder_item = 'Nine';
                break;

            case 'Nine':
                $placeholder_item = 'Ten';
                break;
            
            case 'Ten':
                $placeholder_item = 'Ten';
                break;

            case 'Eleven':
                $placeholder_item = 'Twelve';
                break;

            case 'Twelve':
                $placeholder_item = 'Thirteen';
                break;
           
            
            default:
                $placeholder_item = 'One';
                break;
        }

        return view('backend.classes.create', compact('placeholder_item'));
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
            'name' => 'required|unique:classes,name|max:25|min:3|alpha',
        ]);

        Classes::create($validated);
        return redirect()->route('classes.index')->with('success', 'Class created successfully');
        // TODO: Implement Alert Notification About Class Created And Show it index page.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($className)
    {
        $class = Classes::where('name', $className)->first();

        $present = Attendance::where('date', date('d-m-Y'))
                    ->where('class_name', $className)
                    ->where('status', 'present')
                    ->count();

        $students = Student::where('classes_id', $class->id)
                    ->with([
                        'classes' => function ($query) {
                            $query->select('id', 'name');
                        },
                        'attendances' => function ($query) {
                            $query->where('date', date('d-m-Y'))->select('id','student_roll', 'status', 'created_at')-> latest()->get();
                        }
                    ])
                    ->paginate(50);
                    
        $absent = $students->count() - $present;

        return view('backend.classes.show', compact('class', 'students', 'present', 'absent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $class)
    {
        return view('backend.classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $class)
    {
        $validated = $request->validate([
            'name' => 'required|unique:classes,name|max:25|min:3|alpha',
        ]);

        $class->update($validated);
        return redirect()->route('classes.index')->with('success', 'Class Updated successfully');
        // TODO: Implement Alert Notification About Class Updated And Show it index page.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $class)
    {
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Class Deleted successfully');
        //TODO: Implement Alert Notification About Class Deleted And Show it index page.
    }

    public function attendance(Request $request)
    {
        dd($request->all());
        // $class = Classes::where('name', $request->class)->first();
        // $students = Student::where('classes_id', $class->id)
        //             ->orderBy('roll', 'asc')
        //             ->with('classes')->paginate(30);
        // return view('backend.classes.attendance', compact('class', 'students'));
    }
}
