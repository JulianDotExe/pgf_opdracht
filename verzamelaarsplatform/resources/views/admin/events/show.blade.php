<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evenement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="flex">
                <p class="bg-blue-500 text-white py-2 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">
                    <strong>Created: </strong> {{ $event->created_at->diffForHumans() }}
                </p> 
                <p class="bg-blue-500 text-white py-2 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">
                    <strong>Updated at: </strong> {{ $event->updated_at->diffForHumans() }}
                </p>
            </div> --}}
            <div class="flex">
                <p class="bg-blue-500 text-white py-2 px-2 rounded inline-block transition duration-300 ease-in-out mr-5">
                    <strong>Created: </strong>
                    {{ optional($event->created_at)->diffForHumans() ?? 'N/A' }}
                </p> 
                <p class="bg-blue-500 text-white py-2 px-2 rounded inline-block transition duration-300 ease-in-out">
                    <strong>Updated at: </strong>
                    {{ optional($event->updated_at)->diffForHumans() ?? 'N/A' }}
                </p>
            </div>
            

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-blue-400 text-xl">
                    <strong>Evenement gegevens</strong>
                </h2>
                <div class="text">
                    <p><strong>Naam:</strong> {{ $event->event_name}}</p>
                    <p><strong>Datum:</strong> {{ $event->event_date}}</p>
                    @if($event->category())
                        <p><strong>Categorie:</strong> {{ $event->category()->category_name }}</p>
                    @else
                        <p><strong>Categorie:</strong> Geen categorie</p>
                    @endif
                    <p><strong>Locatie:</strong> {{ $event->locatie }}</p>
                    <p><strong>Beschrijving:</strong> {{ $event->beschrijving }}</p>
                    <p><strong>Url/Link:</strong> <a class="underline text-blue-400 hover:text-blue-600" href="{{ $event->link }}" target="_blank">{{ $event->link }}</a></p>
                </div> <br>
                <a href="{{ route('admin.events.index') }}" class="bg-blue-500 text-white py-1 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Terug</a>
                <a href="{{ route('admin.events.edit', $event->event_id) }}" class="bg-blue-500 text-white py-1 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Informatie wijzigen</a>

            </div>
        </div>
    </div>
</x-app-layout>
