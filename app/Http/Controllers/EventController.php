<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Attendee;
use App\Models\Category;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate(10);
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select(['id', 'name'])->get();
        return view('events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {

        Event::create($request->validated());

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Event $event)
    // {
    //     $event->load(['category', 'attendees']);
    
    //     return view('events.show', compact('event'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $attendee = Attendee::select(['id', 'first_name', 'last_name'])->get();
        $events = Event::select(['title', 'description', 'date', 'location', 'category_id'])->get();
        $category = Category::select(['name'])->get();

        $currentAssignedAttendeeId = $event->attendee_id;
        $currentAssignedEventId = $event->id;
        $currentAssignedCategoryId = $event->category_id;

        return view('events.edit', compact(
            'event',
            'events',
            'attendee',
            'category',
            'currentAssignedAttendeeId',
            'currentAssignedEventId',
            'currentAssignedCategoryId',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->validated());

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        
        $event->delete();
        return redirect()->route('events.index');
    }

    /**
     * Get the event data in JSON format.
     */
    public function getEventJson(Event $event = null)
    {
        if ($event) {
            return response()->json($event);
        }
        return response()->json(Event::all());
    }
}
