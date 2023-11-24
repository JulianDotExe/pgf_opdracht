<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="flex">
                <p class="bg-blue-500 text-white py-2 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">
                    <strong>Created: </strong> {{ $news->created_at->diffForHumans() }}
                </p> 
                <p class="bg-blue-500 text-white py-2 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">
                    <strong>Updated at: </strong> {{ $news->updated_at->diffForHumans() }}
                </p>
            </div> --}}
            <div class="flex">
                <p class="bg-blue-500 text-white py-2 px-2 rounded inline-block transition duration-300 ease-in-out mr-5">
                    <strong>Created: </strong>
                    {{ optional($news->created_at)->diffForHumans() ?? 'N/A' }}
                </p> 
                <p class="bg-blue-500 text-white py-2 px-2 rounded inline-block transition duration-300 ease-in-out">
                    <strong>Updated at: </strong>
                    {{ optional($news->updated_at)->diffForHumans() ?? 'N/A' }}
                </p>
            </div>
            

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-blue-400 text-xl">
                    <strong>News gegevens</strong>
                </h2>
                <div class="text">
                    <p><strong>Titel: </strong> {{ $news->titel}}</p>
                    @if($news->category())
                        <p><strong>Categorie: </strong> {{ $news->category()->category_name }}</p>
                    @else
                        <p><strong>Categorie: </strong> Geen categorie</p>
                    @endif
                    <p><strong>Inhoud: </strong> {{ $news->inhoud}}</p>
                    <p><strong>Auteur: </strong> {{ $news->auteur }}</p>
                    <p><strong>Url/Link: </strong> <a class="underline text-blue-400 hover:text-blue-600" href="{{ $news->link }}" target="_blank">{{ $news->link }}</a></p>
                </div> <br>
                <a href="{{ route('admin.news.index') }}" class="bg-blue-500 text-white py-1 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Terug</a>
                <a href="{{ route('admin.news.edit', $news->artikel_id) }}" class="bg-blue-500 text-white py-1 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Informatie wijzigen</a>

            </div>
        </div>
    </div>
</x-app-layout>
