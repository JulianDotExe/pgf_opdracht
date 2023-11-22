<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Collecties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('overviews.create') }}" class="bg-blue-500 text-white p-3 rounded inline-block hover:bg-blue-600 transition duration-300 ease-in-out">Collectie toevoegen</a>

            @forelse($overviews as $overview)
                <div class="flex my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <div class="w-2/3 pr-6">
                        <h2><strong>Soort:</strong> {{ $overview->sort_id }}</h2>
                        <p><strong>Merk:</strong> {{ $overview->brand_id }}</p>

                        <!-- Verwijderknop -->
                        <button type="button" onclick="deleteOpenConfirmationPopup('{{ $overview->id }}')" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>

                        <h1>
                            <a href="{{ route('overviews.show', $overview->id) }}" class="text-blue-500 hover:underline hover:text-blue-700 transition duration-300 ease-in-out">Meer details</a>
                        </h1>
                    </div>

                    <!-- Image -->
                    <div class="w-1/3">
                        <!-- Display the image if available -->
                        @if(count($overview->getImages()) > 0)
                        <div>
                            <div class="mt-2">
                                @foreach($overview->getImages() as $image)
                                    <img src="{{ asset($image) }}" alt="Collection Image" class="my-4 small-image">
                                @endforeach
                            </div>
                        </div>
                            @else
                                <p>There's no image associated with this collection.</p>
                            @endif
                        </div>
                    </div>

                <!-- Confirmation popup -->
                <div id="confirmationPopup" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center" style="display: none;">
                    <div class="bg-white p-8 rounded-md shadow-md">
                        <p class="text-lg mb-4">Weet je zeker dat je dit wilt verwijderen?</p>
                        <div class="flex justify-between">
                            <button onclick="deleteCloseConfirmationPopup()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuleren</button>

                            <form id="deleteForm" method="POST" action="{{ route('overviews.destroy', $overview->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Bevestigen</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="btn bg-transparent p-2 dark:text-slate-200 btn-link btn-lg mb-2">
                    <p>Geen collecties beschikbaar...</p>
                </div>
            @endforelse

            {{ $overviews->links() }}

        </div>
    </div>
</x-app-layout>

<script>
    function deleteOpenConfirmationPopup(itemId) {
        // Set the form action dynamically based on the item ID
        var form = document.getElementById('deleteForm');
        form.action = "{{ route('overviews.destroy', '') }}" + '/' + itemId;
        // Show the confirmation popup
        document.getElementById('confirmationPopup').style.display = 'flex';
    }
    function deleteCloseConfirmationPopup() {
        // Hide the confirmation popup
        document.getElementById('confirmationPopup').style.display = 'none';
    }
</script>

<style>
    .small-image {
        max-width: 100px; /* Adjust the max-width as needed */
        margin-left: auto; /* Move the image to the right */
    }
</style>