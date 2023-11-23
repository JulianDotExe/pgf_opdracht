<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Collecties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <p class="bg-blue-500 text-white py-2 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">
                    <strong>Created: </strong> {{ $overview->created_at->diffForHumans() }}
                </p> 
                <p class="bg-blue-500 text-white py-2 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">
                    <strong>Updated at: </strong> {{ $overview->updated_at->diffForHumans() }}
                </p>
            </div>

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-blue-400 text-xl">
                    <strong>Collectie gegevens</strong>
                </h2>
                <div class="text">
                <p><strong>Soort: </strong> {{ $overview->sort->sort_name }}</p>
                <p><strong>Merk: </strong> {{ $overview->brand->brand_name }}</p>
                <p><strong>Catalogusnummer: </strong> {{ $overview->catalogusnr }}</p>
                <p><strong>Epoche: </strong> {{ $overview->epoche->epoche_name }}</p>
                <p><strong>Nummer: </strong> {{ $overview->nummer }}</p>
                <p><strong>Eigenschappen: </strong> {{ $overview->eigenschappen }}</p>
                <p><strong>Eigenaar: </strong> {{ $overview->owner->owner_name}}</p>
                <p><strong>1e Kleur: </strong> {{ $overview->color1->color1 }}</p>
                <p><strong>2e Kleur: </strong> {{ $overview->color2->color2 }}</p>
                <p><strong>Bijzonderheden: </strong> {{ $overview->bijzonderheden }}</p>

                    <!-- Display the image if available -->
                    @if(count($overview->getImages()) > 0)
                        <div>
                            <div>
                                @foreach($overview->getImages() as $image)
                                    <img src="{{ asset($image) }}" alt="Collection Image" class="my-4 fixed-size-image">
                                @endforeach
                            </div>
                        </div>
                    @else
                        <p>There's no image associated with this collection.</p>
                    @endif 
            </div> <br>
            <a href="{{ url()->previous() }}" class="bg-blue-500 text-white py-1 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Terug</a>
            <a href="{{ route('overviews.edit', $overview->id)  }}" class="bg-blue-500 text-white py-1 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Collectie wijzigen</a>

            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .fixed-size-image-container {
        position: sticky;
        top: 0;
    }

    .fixed-size-image {
        max-width: 25%;
        height: auto;
        width: 100%;
    }
</style>