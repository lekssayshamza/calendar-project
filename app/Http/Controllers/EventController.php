<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $events = Event::all();
        $events = Auth::user()->events; // Only events for this user
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
            'all_day' => 'nullable|boolean',
            'color' => 'nullable|string|max:7', // assuming hex color
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
        ]);

        

        // Assign the currently authenticated user's ID
        $validated['user_id'] = Auth::id();

        // Ensure all_day is boolean and defaults to false if unchecked
        $validated['all_day'] = $request->has('all_day');

        Event::create($validated);
        

        return redirect()->route('events.calendar')->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'start_time' => 'sometimes|required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
            'all_day' => 'nullable|boolean',
            'color' => 'nullable|string|max:7',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
        ]);

        // Ensure all_day is always set as boolean (true if checked, false otherwise)
        $validated['all_day'] = $request->boolean('all_day', false);

        if ($request->has('all_day')) {
            $validated['all_day'] = $request->boolean('all_day');
        } else if ($request->isMethod('post') || $request->isMethod('put')) {
            unset($validated['all_day']);
        }

        try {
            $updated = $event->update($validated);
            if (!$updated) {
                return back()->withErrors('Failed to update event.');
            }
        } catch (\Exception $e) {
            Log::error('Error updating event: ' . $e->getMessage());
            return back()->withErrors('Error updating event: ' . $e->getMessage());
        }

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Event updated successfully']);
        }

        return redirect()->route('events.calendar')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.calendar')->with('success', 'Event deleted successfully.');
    }

    public function calendar()
    {
        $events = Event::where('user_id', Auth::id())->get();

        // Prepare events in JSON format for FullCalendar
        $calendarEvents = $events->map(function ($event) {
            $end = $event->end_time;
            if ($event->all_day && $end) {
                $end = date('Y-m-d', strtotime($end . ' +1 day'));
            }
            return [
                'id' => $event->id,            // add this line
                // 'title' => $event->title,
                'title' => $event->title . ' (' . $event->category . ')',
                'start' => $event->start_time,
                'end' => $end,
                'allDay' => $event->all_day,
                'color' => $event->color,
                'category' => $event->category,
            ];
        });

        return view('events.calendar', ['calendarEvents' => $calendarEvents]);
    }
}
