<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event;
use App\Http\Requests\StoreAttendeeRequest;
use App\Http\Requests\UpdateAttendeeRequest;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendees = Attendee::with('event')->paginate(10);
        $events = Event::get('title');
        return view('attendees.index', compact('attendees', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::select('id','title')->get();

        return view('attendees.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendeeRequest $request)
    {
        Attendee::create($request->validated());
        return redirect()->route('attendees.index')->with('success', 'Attendee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendee $attendee)
    {
        $attendee->load('event');
        
        return view('attendees.show', compact('attendee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendee $attendee)
    {
        $events = Event::select('id','title')->get(); //requirment for the dropdow
        $oldEventId = $attendee->event_id;
        return view('attendees.edit', compact('attendee','events','oldEventId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendeeRequest $request, Attendee $attendee)
    {
        $attendee->update($request->validated());

        return redirect()->route('attendees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendee $attendee)
    {
        $attendee->delete();
        return redirect()->route('attendees.index');
    }
}
