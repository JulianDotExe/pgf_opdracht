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
                <a href="{{ route('inrichtings.index', ['type' => 'sorts']) }}" class="bg-blue-500 text-white p-1 rounded inline-block hover:bg-blue-600 transition duration-300 ease-in-out">Toon Soorten</a>
                <a href="{{ route('inrichtings.index', ['type' => 'brands']) }}" class="bg-blue-500 text-white p-1 rounded inline-block hover:bg-blue-600 transition duration-300 ease-in-out">Toon Merken</a>
                <a href="{{ route('inrichtings.index', ['type' => 'epoches']) }}" class="bg-blue-500 text-white p-1 rounded inline-block hover:bg-blue-600 transition duration-300 ease-in-out">Toon Epoches</a>
                <a href="{{ route('inrichtings.index', ['type' => 'owners']) }}" class="bg-blue-500 text-white p-1 rounded inline-block hover:bg-blue-600 transition duration-300 ease-in-out">Toon Eigenaren</a>
                <a href="{{ route('inrichtings.index', ['type' => 'colors1']) }}" class="bg-blue-500 text-white p-1 rounded inline-block hover:bg-blue-600 transition duration-300 ease-in-out">Toon Kleur 1</a>
                <a href="{{ route('inrichtings.index', ['type' => 'colors2']) }}" class="bg-blue-500 text-white p-1 rounded inline-block hover:bg-blue-600 transition duration-300 ease-in-out">Toon Kleur 2</a>
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
            @elseif($type == 'epoches')
                <div>
                    @forelse($epoches as $epoche)
                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <h2><strong>Epoche:</strong>{{ $epoche->epoche_id }}</h2>

                            <!-- Verwijderknop -->
                            <form method="POST" action="{{ route('inrichtings.destroy', $epoche->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>
                            </form>

                            <h1>
                                <a href="{{ route('inrichtings.show', $epoche->id) }}" class="text-blue-500 hover:underline hover:text-blue-700 transition duration-300 ease-in-out">Meer details</a>
                            </h1>

                            {{-- Hier kun je andere details van de sort toevoegen --}}
                        </div>
                    @empty
                        <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                            <p>Geen collecties beschikbaar...</p>
                        </div>
                    @endforelse
                </div>
            @elseif($type == 'owners')
                <div>
                    @forelse($owners as $owner)
                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <h2><strong>Eigenaar:</strong>{{ $owner->owner_id }}</h2>

                            <!-- Verwijderknop -->
                            <form method="POST" action="{{ route('inrichtings.destroy', $owner->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>
                            </form>

                            <h1>
                                <a href="{{ route('inrichtings.show', $owner->id) }}" class="text-blue-500 hover:underline hover:text-blue-700 transition duration-300 ease-in-out">Meer details</a>
                            </h1>

                            {{-- Hier kun je andere details van de sort toevoegen --}}
                        </div>
                    @empty
                        <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                            <p>Geen collecties beschikbaar...</p>
                        </div>
                    @endforelse
                </div>
            @elseif($type == 'colors1')
                <div>
                    @forelse($colors1 as $color1)
                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <h2><strong>Kleur 1:</strong>{{ $color1->color1_id }}</h2>

                            <!-- Verwijderknop -->
                            <form method="POST" action="{{ route('inrichtings.destroy', $color1->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>
                            </form>

                            <h1>
                                <a href="{{ route('inrichtings.show', $color1->id) }}" class="text-blue-500 hover:underline hover:text-blue-700 transition duration-300 ease-in-out">Meer details</a>
                            </h1>

                            {{-- Hier kun je andere details van de sort toevoegen --}}
                        </div>
                    @empty
                        <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                            <p>Geen collecties beschikbaar...</p>
                        </div>
                    @endforelse
                </div>
            @elseif($type == 'colors2')
                <div>
                    @forelse($colors2 as $color2)
                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <h2><strong>Kleur 2:</strong>{{ $color2->color2_id }}</h2>

                            <!-- Verwijderknop -->
                            <form method="POST" action="{{ route('inrichtings.destroy', $color2->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>
                            </form>

                            <h1>
                                <a href="{{ route('inrichtings.show', $color2->id) }}" class="text-blue-500 hover:underline hover:text-blue-700 transition duration-300 ease-in-out">Meer details</a>
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
