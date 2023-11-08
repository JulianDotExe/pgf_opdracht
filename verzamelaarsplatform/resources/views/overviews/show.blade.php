<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Object') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <p class="opacity-70">
                    <strong>Created: </strong> {{ $overview->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70 ml-8">
                    <strong>Updated at: </strong> {{ $overview->updated_at->diffForHumans() }}
                </p>
            </div>

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-blue-400 text-xl">
                    <strong>Objectgegevens</strong>
                </h2>
                <div class="text">
                    <p><strong>Soort:</strong> {{ $overview->sort_name }}</p>
                    <p><strong>Merk:</strong> {{ $overview->brand_name }}</p>
                    <p><strong>Catalogusnummer:</strong> {{ $overview->catalogusnr }}</p>
                    <p><strong>Epoche:</strong> {{ $overview->epoche_name }}</p>
                    <p><strong>Nummer:</strong> {{ $overview->nummer }}</p>
                    <p><strong>Eigenschappen:</strong> {{ $overview->eigenschappen }}</p>
                    <p><strong>Eigenaar:</strong> {{ $overview->owner_name }}</p>
                    <p><strong>Kleur 1:</strong> {{ $overview->color_name }}</p>
                    <p><strong>Kleur 2:</strong> {{ $overview->color_name }}</p>
                    <p><strong>Bijzonderheden:</strong> {{ $overview->bijzonderheden }}</p>
                    <p><strong>Foto:</strong> {{ $overview->foto }}</p>

                </div> <br>
                <a href="{{ route('overviews.index') }}" class="btn btn-primary mb-4">Terug</a> <br> {{-- Terug knop --}}
                <a href="{{ route('overviews.edit', $overview->id)  }}" class="btn-link ml-auto">Edit Object</a>

            </div>
        </div>
    </div>
</x-app-layout>
