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
                    <h2><strong>Soort:</strong>{{ $event->sort_name }}</h2>
                    <p><strong>Merk:</strong> {{ $event->brand_name }}</p>

                    <!-- Verwijderknop -->
                    <form method="POST" action="{{ route('admin.event.destroy', $event->id) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>
                    </form>



                    <h1>
                        <a href="{{ route('event.show', $overview->id) }}" class="text-blue-500 hover:underline hover:text-blue-700 transition duration-300 ease-in-out">Meer details</a>
                    </h1>

                    {{-- Je kunt hier andere treingegevens toevoegen --}}
                </div>
            @empty
            <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                <p>Geen evenementen beschikbaar...</p>
            </div>
            @endforelse
            {{ $events->links() }}
        </div>
    </div>
</x-app-layout>