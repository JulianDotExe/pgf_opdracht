<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inrichtingen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('inrichtings.create') }}" class="bg-blue-500 text-white p-3 rounded inline-block hover:bg-blue-600 transition duration-300 ease-in-out">Inrichting toevoegen</a>

            <div class="my-6">
                <a href="{{ route('inrichtings.index', ['type' => 'sorts']) }}" class="text-blue-500 hover:underline hover:text-blue-700 transition duration-300 ease-in-out">Toon Sorts</a>
                <a href="{{ route('inrichtings.index', ['type' => 'brands']) }}" class="text-blue-500 hover:underline hover:text-blue-700 transition duration-300 ease-in-out">Toon Brands</a>
            </div>

            @if($type == 'sorts')
                <div>
                    @forelse($sorts as $sort)
                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <h2><strong>Soort:</strong>{{ $sort->sort_id }}</h2>

                            <!-- Verwijderknop -->
                            <form method="POST" action="{{ route('inrichtings.destroy', $sort->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>
                            </form>

                            <h1>
                                <a href="{{ route('inrichtings.show', $sort->id) }}" class="text-blue-500 hover:underline hover:text-blue-700 transition duration-300 ease-in-out">Meer details</a>
                            </h1>

                            {{-- Hier kun je andere details van de sort toevoegen --}}
                        </div>
                    @empty
                        <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                            <p>Geen collecties beschikbaar...</p>
                        </div>
                    @endforelse
                </div>
            @elseif($type == 'brands')
                <div>
                    @forelse($brands as $brand)
                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <h2><strong>Merk:</strong>{{ $brand->brand_id }}</h2>

                            <!-- Verwijderknop -->
                            <form method="POST" action="{{ route('inrichtings.destroy', $brand->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>
                            </form>

                            <h1>
                                <a href="{{ route('inrichtings.show', $brand->id) }}" class="text-blue-500 hover:underline hover:text-blue-700 transition duration-300 ease-in-out">Meer details</a>
                            </h1>

                            {{-- Hier kun je andere details van de sort toevoegen --}}
                        </div>
                    @empty
                        <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                            <p>Geen collecties beschikbaar...</p>
                        </div>
                    @endforelse
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
