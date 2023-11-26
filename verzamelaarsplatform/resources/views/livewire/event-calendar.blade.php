@vite('resources/css/app.css')
@vite('resources/js/app.js')

@livewireStyles

<div class="bg-white w-1/2 absolute left-2/4 top-1/2 transform -translate-x-1/2 -translate-y-1/2 ">
    <div id="calendar"></div>
    <div id="event-details">
    <h2>Events on {{ $selectedDate ? \Carbon\Carbon::parse($selectedDate)->format('Y-m-d') : 'No date selected' }}:</h2>
        @forelse ($events as $event)
            <p>{{ $event->event_name }} - {{ $event->beschrijving }} - {{ $event->locatie }}</p>
        @empty
            <p>No events on selected date.</p>
        @endforelse

    </div>
</div>

@livewireScripts

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            // Your calendar options here
            // ...

            dateClick: function (info) {
                var clickedDate = info.date.toISOString().split('T')[0];
                console.log(clickedDate); // Log clicked date to the console for debugging

                // Livewire emit to trigger PHP function
                @this.set('selectedDate', clickedDate);
                console.log(@this.get('selectedDate')); // Log selectedDate to the console for debugging
            }
        });

        calendar.render();
    });
</script>
