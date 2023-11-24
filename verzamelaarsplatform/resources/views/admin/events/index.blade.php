<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evenementen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.events.create') }}" class="bg-blue-500 text-white p-3 rounded inline-block hover:bg-blue-600 transition duration-300 ease-in-out">Evenement toevoegen</a>
            
            @forelse($events as $event)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2><strong>Event name: </strong>{{ $event->event_name }}</h2>
                    <p><strong>Categorie:</strong> {{ $event->category()->category_name }}</p>

                    <!-- Verwijderknop -->
                    <div class="flex">
                        <button type="button" onclick="deleteOpenConfirmationPopup('{{ $event->event_id }}')" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>

                        <!-- Confirmation popup -->
                        <div id="confirmationPopup-{{ $event->event_id }}" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center" style="display: none;">
                            <div class="bg-white p-8 rounded-md shadow-md">
                                <p class="text-lg mb-4">Weet je zeker dat je dit wilt verwijderen?</p>
                                <div class="flex justify-between">
                                    <button onclick="deleteCloseConfirmationPopup('{{ $event->event_id }}')" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuleren</button>

                                    <form id="deleteForm-{{ $event->event_id }}" method="POST" action="{{ route('admin.events.destroy', $event->event_id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Bevestigen</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h1>
                        <a href="{{ route('admin.events.show', $event->event_id) }}" class="text-blue-500 hover:underline hover:text-blue-700 transition duration-300 ease-in-out">Meer details</a>
                    </h1>
                    {{-- Je kunt hier andere treingegevens toevoegen --}}
                </div>
            @empty
            <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                <p>Geen evenementen beschikbaar...</p>
            </div>
            @endforelse
        </div>
    </div>

    <script>
        function deleteOpenConfirmationPopup(eventId) {
            // Show the confirmation popup
            document.getElementById('confirmationPopup-' + eventId).style.display = 'flex';
        }
        
        function deleteCloseConfirmationPopup(eventId) {
            // Hide the confirmation popup
            document.getElementById('confirmationPopup-' + eventId).style.display = 'none';
        }
    </script>
</x-app-layout>