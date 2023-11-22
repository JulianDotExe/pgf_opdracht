<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
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
        $categories = Categorie::all();
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
            'categories_id' => 'required|exists:categories,id',
            'locatie' => 'required|string',
            'link' => 'nullable|url',
            'beschrijving' => 'nullable|string',
        ]);

        $validatedData['created_at'] = now();
        $validatedData['updated_at'] = now();

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
        $event = Event::find($event->event_id);

        if (!$event) {
            // Handle if the event is not found
            return abort(404);
        }
    
        // Display the event information
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Categorie::all();
        return view('admin.events.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'event_date' => 'required|date_format:Y-m-d',
                'event_name' => 'required|string',
                'categories_id' => 'required|exists:categories,id',
                'locatie' => 'required|string',
                'link' => 'nullable|url',
                'beschrijving' => 'nullable|string',
            ]);

            $validatedData['updated_at'] = now();
            // Update the event attributes with validated data
            $event->update($validatedData);
    
            // If everything goes well, redirect
            return redirect()->route('admin.events.index')->with('message', 'Event updated successfully!');
        } catch (ValidationException $e) {
            // Validation failed; redirect back with errors
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Other exceptions/errors occurred
            // Log the error or handle it as needed
            return redirect()->back()->with('error', 'An error occurred while updating the event.');
        }


        // echo "$event->event_name<br>";
        // echo "$event->event_date<br>";
        // echo "$event->categories_id<br>";
        // echo "$event->locatie<br>";
        // echo "$event->link<br>";
        // echo "$event->beschrijving<br>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        try {
            // Use the delete method to remove the event
            $event->delete();
    
            // Redirect with a success message
            return redirect()->route('admin.events.index')->with('message', 'Event deleted successfully!');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->back()->with('error', 'An error occurred while deleting the event.');
        }
    }
}
