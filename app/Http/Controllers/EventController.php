<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Guest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->id();
        $events = Event::where('user_id', $id)->get();
        return view('event.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required',
            'event_type' => 'required',
            'event_host' => 'required',
            'groom' => 'required',
            'bride' => 'required',
            'date' => 'required',
            'time' => 'required',
            'venue' => 'required',
            'location' => 'required',
        ]);

        $event = new Event;
        $event->event_name = $request->input('event_name');
        $event->event_host = $request->input('event_host');
        $event->event_type = $request->input('event_type');
        $event->groom = $request->input('groom');
        $event->bride = $request->input('bride');
        $event->date = $request->input('date');
        $event->time = $request->input('time');
        $event->venue = $request->input('venue');
        $event->location = $request->input('location');
        $event->contacts = $request->input('contacts');
        $event->user_id = auth()->id();
        $event->save();

        return redirect('/event')->with('success', 'Event Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::where('id', $id)->first();
        $guests = Guest::where('event_id', $id)->get();

        return view('event.show')->with([
            'event' => $event,
            'guests' => $guests
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
