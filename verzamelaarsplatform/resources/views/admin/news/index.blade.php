<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.news.create') }}" class="bg-blue-500 text-white p-3 rounded inline-block hover:bg-blue-600 transition duration-300 ease-in-out">News toevoegen</a>
            @foreach($news as $new)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2><strong>News name:</strong>{{ $new->titel }}</h2>
                    <p><strong>Link:</strong> {{ $new->link }}</p>

                    <!-- Verwijderknop -->
                    <form method="POST" action="{{ route('admin.news.destroy', $new->artikel_id) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>
                    </form>

                    <h1>
                        <a href="{{ route('admin.news.show', $new->artikel_id) }}" class="text-blue-500 hover:underline hover:text-blue-700 transition duration-300 ease-in-out">Meer details</a>
                    </h1>
                    
                </div>
            @endforeach

            <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                <p>Geen nieuwtjes beschikbaar...</p>
            </div>
        </div>
    </div>
</x-app-layout>
