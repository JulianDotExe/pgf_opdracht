<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $events = Event::paginate(8);
    return view('admin.events.index', compact('events'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'event_date' => 'required|date_format:Y-m-d',
            'event_name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'location' => 'required|string',
            'link' => 'nullable|url',
            'beschrijving' => 'nullable|string',
        ]);

        Event::create($validatedData);
        // If everything goes well, redirect
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
        } catch (ValidationException $e) {
            // Validation failed; redirect back with errors
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Other exceptions/errors occurred
            // Log the error or handle it as needed
            return redirect()->back()->with('error', 'An error occurred while creating the event.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
