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
                    <div class="flex justify-between p-2">
                        <h1 class="flex font-semibold text-xl p-2"></h1>
                        {{-- Search Bar --}}
                        <form action="{{ route('inrichtings.index') }}" method="GET">
                            <input type="text" name="search" placeholder="Search by sort" class="border rounded-md px-2 py-1">
                            <button type="submit" class="bg-blue-500 text-white rounded-md px-3 py-1">Search</button>
                        </form>
                    </div>

                    @forelse($sorts as $sort)
                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <h2><strong>Soort:</strong>{{ $sort->sort_name }}</h2>

                            <!-- Verwijderknop -->
                            <button type="button" onclick="deleteOpenConfirmationPopup('{{ $sort->id }}')" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>

                            {{-- Hier kun je andere details van de sort toevoegen --}}
                        </div>

                        <!-- Confirmation popup -->
                        <div id="confirmationPopup" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center" style="display: none;">
                            <div class="bg-white p-8 rounded-md shadow-md">
                                <p class="text-lg mb-4">Weet je zeker dat je dit wilt verwijderen?</p>
                                <div class="flex justify-between">
                                    <button onclick="deleteCloseConfirmationPopup()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuleren</button>

                                    <form id="deleteForm" method="POST" action="{{ route('inrichtings.destroySort', $sort->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded" onclick="deleteCloseConfirmationPopup()">Bevestigen</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- Script voor destroy -->
                        <script>
                            function deleteOpenConfirmationPopup(itemId) {
                                // Set the form action dynamically based on the item ID
                                var form = document.getElementById('deleteForm');
                                form.action = "{{ route('inrichtings.destroySort', '') }}" + '/' + itemId;

                                // Show the confirmation popup
                                document.getElementById('confirmationPopup').style.display = 'flex';
                            }

                            function deleteCloseConfirmationPopup() {
                                // Hide the confirmation popup
                                document.getElementById('confirmationPopup').style.display = 'none';
                            }
                        </script>
                    @empty
                        <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                            <p>Geen soorten beschikbaar...</p>
                        </div>
                    @endforelse
                </div>
            @elseif($type == 'brands')
                <div>
                    <div class="flex justify-between p-2">
                        <h1 class="flex font-semibold text-xl p-2"></h1>
                        {{-- Search Bar --}}
                        <form action="{{ route('inrichtings.index') }}" method="GET">
                            <input type="text" name="search" placeholder="Search by brand" class="border rounded-md px-2 py-1">
                            <button type="submit" class="bg-blue-500 text-white rounded-md px-3 py-1">Search</button>
                        </form>
                    </div>

                    @forelse($brands as $brand)
                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <h2><strong>Merk:</strong>{{ $brand->brand_name }}</h2>

                            <!-- Verwijderknop -->
                            <button type="button" onclick="deleteOpenConfirmationPopup('{{ $brand->id }}')" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>

                            {{-- Hier kun je andere details van de sort toevoegen --}}
                        </div>

                        <!-- Confirmation popup -->
                        <div id="confirmationPopup" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center" style="display: none;">
                            <div class="bg-white p-8 rounded-md shadow-md">
                                <p class="text-lg mb-4">Weet je zeker dat je dit wilt verwijderen?</p>
                                <div class="flex justify-between">
                                    <button onclick="deleteCloseConfirmationPopup()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuleren</button>

                                    <form id="deleteForm" method="POST" action="{{ route('inrichtings.destroyBrand', $brand->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Bevestigen</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Script voor destroy -->
                        <script>
                            function deleteOpenConfirmationPopup(itemId) {
                                // Set the form action dynamically based on the item ID
                                var form = document.getElementById('deleteForm');
                                form.action = "{{ route('inrichtings.destroyBrand', '') }}" + '/' + itemId;

                                // Show the confirmation popup
                                document.getElementById('confirmationPopup').style.display = 'flex';
                            }

                            function deleteCloseConfirmationPopup() {
                                // Hide the confirmation popup
                                document.getElementById('confirmationPopup').style.display = 'none';
                            }
                        </script>
                    @empty
                        <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                            <p>Geen merken beschikbaar...</p>
                        </div>
                    @endforelse
                </div>
            @elseif($type == 'epoches')
                <div>
                    <div class="flex justify-between p-2">
                        <h1 class="flex font-semibold text-xl p-2"></h1>
                        {{-- Search Bar --}}
                        <form action="{{ route('inrichtings.index') }}" method="GET">
                            <input type="text" name="search" placeholder="Search by epoche" class="border rounded-md px-2 py-1">
                            <button type="submit" class="bg-blue-500 text-white rounded-md px-3 py-1">Search</button>
                        </form>
                    </div>

                    @forelse($epoches as $epoche)
                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <h2><strong>Epoche:</strong>{{ $epoche->epoche_name }}</h2>

                            <!-- Verwijderknop -->
                            <button type="button" onclick="deleteOpenConfirmationPopup('{{ $epoche->id }}')" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>

                            {{-- Hier kun je andere details van de sort toevoegen --}}
                        </div>

                        <!-- Confirmation popup -->
                        <div id="confirmationPopup" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center" style="display: none;">
                            <div class="bg-white p-8 rounded-md shadow-md">
                                <p class="text-lg mb-4">Weet je zeker dat je dit wilt verwijderen?</p>
                                <div class="flex justify-between">
                                    <button onclick="deleteCloseConfirmationPopup()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuleren</button>

                                    <form id="deleteForm" method="POST" action="{{ route('inrichtings.destroy', $epoche->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Bevestigen</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                            <p>Geen epoches beschikbaar...</p>
                        </div>
                    @endforelse
                </div>
            @elseif($type == 'owners')
                <div>
                    <div class="flex justify-between p-2">
                        <h1 class="flex font-semibold text-xl p-2"></h1>
                        {{-- Search Bar --}}
                        <form action="{{ route('inrichtings.index') }}" method="GET">
                            <input type="text" name="search" placeholder="Search by owner" class="border rounded-md px-2 py-1">
                            <button type="submit" class="bg-blue-500 text-white rounded-md px-3 py-1">Search</button>
                        </form>
                    </div>

                    @forelse($owners as $owner)
                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <h2><strong>Eigenaar:</strong>{{ $owner->owner_name }}</h2>

                            <!-- Verwijderknop -->
                            <button type="button" onclick="deleteOpenConfirmationPopup('{{ $owner->id }}')" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>

                            {{-- Hier kun je andere details van de sort toevoegen --}}
                        </div>

                        <!-- Confirmation popup -->
                        <div id="confirmationPopup" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center" style="display: none;">
                            <div class="bg-white p-8 rounded-md shadow-md">
                                <p class="text-lg mb-4">Weet je zeker dat je dit wilt verwijderen?</p>
                                <div class="flex justify-between">
                                    <button onclick="deleteCloseConfirmationPopup()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuleren</button>

                                    <form id="deleteForm" method="POST" action="{{ route('inrichtings.destroy', $owner->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Bevestigen</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                            <p>Geen Eigenaren beschikbaar...</p>
                        </div>
                    @endforelse
                </div>
            @elseif($type == 'colors1')
                <div>
                    <div class="flex justify-between p-2">
                        <h1 class="flex font-semibold text-xl p-2"></h1>
                        {{-- Search Bar --}}
                        <form action="{{ route('inrichtings.index') }}" method="GET">
                            <input type="text" name="search" placeholder="Search by color1" class="border rounded-md px-2 py-1">
                            <button type="submit" class="bg-blue-500 text-white rounded-md px-3 py-1">Search</button>
                        </form>
                    </div>

                    @forelse($colors1 as $color1)
                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <h2><strong>Kleur 1:</strong>{{ $color1->color1 }}</h2>

                            <!-- Verwijderknop -->
                            <button type="button" onclick="deleteOpenConfirmationPopup('{{ $color1->id }}')" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>

                            {{-- Hier kun je andere details van de sort toevoegen --}}
                        </div>

                        <!-- Confirmation popup -->
                        <div id="confirmationPopup" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center" style="display: none;">
                            <div class="bg-white p-8 rounded-md shadow-md">
                                <p class="text-lg mb-4">Weet je zeker dat je dit wilt verwijderen?</p>
                                <div class="flex justify-between">
                                    <button onclick="deleteCloseConfirmationPopup()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuleren</button>

                                    <form id="deleteForm" method="POST" action="{{ route('inrichtings.destroy', $color1->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Bevestigen</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                            <p>Geen kleuren 1 beschikbaar...</p>
                        </div>
                    @endforelse
                </div>
            @elseif($type == 'colors2')
                <div>
                    <div class="flex justify-between p-2">
                        <h1 class="flex font-semibold text-xl p-2"></h1>
                        {{-- Search Bar --}}
                        <form action="{{ route('inrichtings.index') }}" method="GET">
                            <input type="text" name="search" placeholder="Search by color2" class="border rounded-md px-2 py-1">
                            <button type="submit" class="bg-blue-500 text-white rounded-md px-3 py-1">Search</button>
                        </form>
                    </div>

                    @forelse($colors2 as $color2)
                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <h2><strong>Kleur 2:</strong>{{ $color2->color2 }}</h2>

                            <!-- Verwijderknop -->
                            <button type="button" onclick="deleteOpenConfirmationPopup('{{ $color2->id }}')" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>

                            {{-- Hier kun je andere details van de sort toevoegen --}}
                        </div>

                        <!-- Confirmation popup -->
                        <div id="confirmationPopup" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center" style="display: none;">
                            <div class="bg-white p-8 rounded-md shadow-md">
                                <p class="text-lg mb-4">Weet je zeker dat je dit wilt verwijderen?</p>
                                <div class="flex justify-between">
                                    <button onclick="deleteCloseConfirmationPopup()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuleren</button>

                                    <form id="deleteForm" method="POST" action="{{ route('inrichtings.destroy', $color2->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Bevestigen</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                            <p>Geen kleuren 2 beschikbaar...</p>
                        </div>
                    @endforelse
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
