<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->has('search'));

        
        if($request->has('search')){
            $subjects = Subject::with('classes')
            ->whereHas('classes', function($query) use($request){
                $query->where('name', 'like', "%$request->search%");
            })
            ->orWhere('subject_name', 'like', "%$request->search%")
            ->select('id', 'subject_code', 'subject_name', 'classes_id')
            ->orderby('classes_id')
            ->paginate(20);    
        }else{
            $subjects = Subject::with('classes')
            ->select('id', 'subject_code', 'subject_name', 'classes_id')
            ->orderby('classes_id')
            ->paginate(20);
        }

        return view('backend.subject.index',[
            'subjects'  => $subjects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.subject.create', [
            'classes'  => Classes::select('id', 'name')->get()
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
        $validator = Validator::make($request->all(),[
            'subject_name'  =>  ['required', 'string', 'min:3', 'max:25',],
            'subject_code'  =>  ['required', 'string', 'min:2', 'max:10',],
            'classes_id'  =>  ['required', 'exists:classes,id',],
        ]);

        if($validator->fails()){
            foreach ($validator->messages()->messages() as $message) {
                // dd($message);
                flasher($message[0], 'error');
            }
        }
        // dd($validated->validated());

        Subject::create($validator->validate());
        flasher('Subject Created Successfully');
        return redirect()->route('subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('backend.subject.edit', [
            'subject'   =>  $subject,
            'classes'   => Classes::select('id', 'name')->get(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'subject_name'  =>  ['string', 'min:3', 'max:25', 'required'],
            'subject_code'  =>  ['string', 'min:2', 'max:10', 'required'],
            'classes_id'  =>  ['exists:classes,id', 'required'],
        ]);


        $subject->update($validated);

        flasher('Subject Updated Successfully');
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        
        flasher('Subject Deleted Successfully', 'info');
        return redirect()->route('subject.index');
    }
}
