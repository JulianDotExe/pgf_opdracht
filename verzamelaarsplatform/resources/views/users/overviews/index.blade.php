<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Collecties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between p-2">
                <a href="{{ route('admin.overviews.create') }}" class="bg-blue-500 text-white p-3 rounded inline-block hover:bg-blue-600 transition duration-300 ease-in-out">Collectie toevoegen</a>
                {{-- Search Bar --}}
                <form class="pt-2 pb-1" action="{{ route('admin.overviews.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search..." class="border rounded-md px-2 py-1">
                    <button type="submit" class="bg-blue-500 text-white rounded-md px-3 py-1">Search</button>
                </form>
            </div>

            @forelse($overviews as $overview)
                <div class="flex my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                        <div class="w-2/3 pr-6">
                            <h2><strong>Eigenaar: </strong> {{ $overview->owner->owner_name}}</h2>
                            <h2><strong>Soort: </strong> {{ $overview->sort->sort_name}}</h2>
                            <p><strong>Merk: </strong> {{ $overview->brand->brand_name }}</p>
                        <h1 class="pt-2">
                            <p><a href="{{ route('admin.overviews.show', $overview->id) }}" class="text-blue-500 hover:underline hover:text-blue-700 transition duration-300 ease-in-out">Meer details</a></p>
                            <!-- Verwijderknop -->
                            <button type="button" onclick="deleteOpenConfirmationPopup('{{ $overview->id }}')" class="text-red-500 hover:underline hover:text-red-700 transition duration-300 ease-in-out">Verwijderen</button>
                        </h1>
                    </div>

                    <!-- Image -->
                    <div class="w-1/3">
                        <!-- Display the image if available -->
                        @if(count($overview->getImages()) > 0)
                        <div>
                            <div class="mt-2">
                                @foreach($overview->getImages() as $image)
                                <img src="{{ asset($image) }}" alt="Collection Image" class="my-4 small-image" onclick="openLightbox('{{ asset($image) }}')">
                                @endforeach
                            </div>
                        </div>
                        @else
                        <p>There's no image associated with this collection.</p>
                        @endif
                    </div>

                    <!-- Lightbox container -->
                    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
                        <img id="lightboxImage" src="" alt="Enlarged Image">
                    </div>
                </div>

                <!-- Confirmation popup -->
                <div id="confirmationPopup" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center" style="display: none;">
                    <div class="bg-white p-8 rounded-md shadow-md">
                        <p class="text-lg mb-4">Weet je zeker dat je dit wilt verwijderen?</p>
                        <div class="flex justify-between">
                            <button onclick="deleteCloseConfirmationPopup()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuleren</button>

                            <form id="deleteForm" method="POST" action="{{ route('admin.overviews.destroy', $overview->id) }}" class="inline">
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

            {{ $overviews->appends(request()->input())->links() }}
            {{-- {{ $overviews->links() }} --}}

        </div>
    </div>
</x-app-layout>

<script>
    function openLightbox(imageSrc) {
        // Set the lightbox image source
        document.getElementById('lightboxImage').src = imageSrc;
        // Show the lightbox
        document.getElementById('lightbox').style.display = 'flex';
    }

    function closeLightbox() {
        // Hide the lightbox
        document.getElementById('lightbox').style.display = 'none';
    }
</script>

<style>
    .small-image {
        max-width: 100px; /* Adjust the max-width as needed */
        margin-left: auto; /* Move the image to the right */
        cursor: pointer; /* Add cursor */
    }

    /* Lightbox styles */
    .lightbox {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
    }

    .lightbox img {
        max-width: 80%;
        max-height: 80%;
        border-radius: 5px;
    }
</style>
