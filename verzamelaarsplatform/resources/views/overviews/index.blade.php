<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Overzichten') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('overviews.create') }}" class="btn bg-white btn-link btn-lg mb-2">+ Nieuw object</a>
            
            @forelse($overviews as $overview)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2><strong>Soort:</strong>{{ $overview->sort_name }}</h2>
                    <p><strong>Merk:</strong> {{ $overview->brand_name }}</p>

                    <form method="POST" action="{{ route('overviews.destroy', $overview) }}">
                        @csrf
                        @method('delete')
                        <x-dropdown-link :href="route('overviews.destroy', $overview)" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Delete') }}
                        </x-dropdown-link>
                    </form>


                    <h2>
                        <a href="{{ route('overviews.show', $overview->id ) }}">Meer details</a>    
                    </h2>
                    {{-- Je kunt hier andere treingegevens toevoegen --}}
                </div>
            @empty
            <div class="btn bg-white btn-link btn-lg mb-2">
                <p>Geen objecten beschikbaar...</p>
            </div>
            @endforelse
            {{ $overviews->links() }}
        </div>
    </div>
</x-app-layout>