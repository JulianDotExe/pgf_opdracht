<?php

// app/Http/Livewire/EventCalendar.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class EventCalendar extends Component
{
    public $events;
    public $selectedDate;

    public function mount()
    {
        $this->events = Event::all(); // Fetch events from the database
    }

    public function render()
    {
        $filteredEvents = $this->events;
    
        // Filter events for the selected date, if any
        if ($this->selectedDate) {
            // Format the selected date and remove the time portion
            $formattedDate = Carbon::parse($this->selectedDate)->startOfDay();
    
            // Log the formatted date for debugging
            \Log::info("Formatted Date: " . $formattedDate);
    
            // Use the filter method to select events matching the date
            $filteredEvents = $this->events->filter(function ($event) use ($formattedDate) {
                $eventDate = Carbon::parse($event->event_date)->startOfDay();
                
                // Log the event date for debugging
                \Log::info("Event Date: " . $eventDate);
    
                return $eventDate == $formattedDate;
            });
        }
    
        return view('livewire.event-calendar', ['events' => $filteredEvents]);
    }
    
}