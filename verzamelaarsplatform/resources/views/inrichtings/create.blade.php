<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inrichting toevoegen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mx-auto mt-4">
                    <div class="bg-blue-400 text-white rounded-lg p-4 w-300">
                        <h1 class="text-2xl font-semibold">Soort toevoegen</h1>
                    </div>
                </div>


                <form action="/create-sort" method="post">
                    @csrf
                    <x-text-input type="text" name="sort_name" field="sort_name" placeholder="Soort..." class="w-full" autocomplete="off" :value="@old('sort_name')"></x-text-input> <br> <br>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Voeg Soort toe</button>
                </form>
            <br>
                <div class="bg-blue-400 text-white rounded-lg text-center">
                    <h1 class="text-2xl font-semibold">Merk toevoegen</h1>
                </div>
                <form action="/create-brand" method="post">
                    @csrf
                    <x-text-input type="text" name="brand_name" field="brand_name" placeholder="Merk..." class="w-full" autocomplete="off" :value="@old('brand_name')"></x-text-input> <br> <br>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Voeg Merk toe</button> 
                </form>
            <br>
                <div class="bg-blue-400 text-white rounded-lg text-center">
                    <h1 class="text-2xl font-semibold">Epoche toevoegen</h1>
                </div>
                <form action="/create-epoche" method="post">
                    @csrf
                    <x-text-input type="text" name="epoche_name" field="epoche_name" placeholder="Epoche..." class="w-full" autocomplete="off" :value="@old('epoche_name')"></x-text-input> <br> <br>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Voeg Epoche toe</button> 
                </form>
            <br>
                <div class="bg-blue-400 text-white rounded-lg text-center">
                    <h1 class="text-2xl font-semibold">Eigenaar toevoegen</h1>
                </div>
                <form action="/create-owner" method="post">
                    @csrf
                    <x-text-input type="text" name="owner_name" field="owner_name" placeholder="Eigenaar..." class="w-full" autocomplete="off" :value="@old('owner_name')"></x-text-input> <br> <br>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Voeg Eigenaar toe</button> 
                </form>
            <br>
                <div class="bg-blue-400 text-white rounded-lg text-center">
                    <h1 class="text-2xl font-semibold">Kleur 1 toevoegen</h1>
                </div>
                <form action="/create-color1" method="post">
                    @csrf
                    <x-text-input type="text" name="color1_name" field="color1_name" placeholder="Kleur 1..." class="w-full" autocomplete="off" :value="@old('color1_name')"></x-text-input> <br> <br>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Voeg Kleur 1 toe</button> 
                </form>
            <br>
                <div class="bg-blue-400 text-white rounded-lg text-center">
                    <h1 class="text-2xl font-semibold">Kleur 2 toevoegen</h1>
                </div>
                <form action="/create-color2" method="post">
                    @csrf
                    <x-text-input type="text" name="color2_name" field="color2_name" placeholder="Kleur 2..." class="w-full" autocomplete="off" :value="@old('color2_name')"></x-text-input> <br> <br>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Voeg Kleur 2 toe</button> 
                </form>
            <br>    
                <a href="{{ route('inrichtings.index') }}" class="bg-blue-500 text-white py-1 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Terug</a>

        </div>
    </div>
</x-app-layout>