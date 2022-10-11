<?php

namespace App\Http\Controllers;

use App\Models\UpcomingEvent;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class UpcomingEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = UpcomingEvent::all();
        return view('backend.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.event.create');
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
           'event_name' =>  ['required', 'string', 'max:40'],
           'description'    =>  ['required', 'string', 'min:3'],
           'date'   =>  ['required', 'date_format:d-m-Y'], 
        ]);

        UpcomingEvent::create($validated);

        flasher('Event Created');

        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UpcomingEvent  $upcomingEvent
     * @return \Illuminate\Http\Response
     */
    public function show(UpcomingEvent $upcomingEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UpcomingEvent  $upcomingEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(UpcomingEvent $event)
    {
        return view('backend.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpcomingEvent  $upcomingEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpcomingEvent $event)
    {
        $validated = $request->validate([
            'event_name' =>  ['required', 'string', 'max:40'],
            'description'    =>  ['required', 'string', 'min:3'],
            'date'   =>  ['required', 'date_format:d-m-Y'], 
         ]);
 
         $event->update($validated);
 
         flasher('Event Updated');
 
         return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpcomingEvent  $upcomingEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpcomingEvent $event)
    {
        $event->delete();
        
        flasher('Event Deleted Successfully', 'info');
        
        return back();
    }

    public function notification()
    {
        $events = UpcomingEvent::where('date', '>', date('d-m-Y'))->get();

        session(['upcoming_event_count' => count($events)]);


        return view('backend.event.notification', compact('events'));
    }
}
