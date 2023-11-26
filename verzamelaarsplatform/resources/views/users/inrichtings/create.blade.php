<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inrichting toevoegen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mx-auto mt-4">

                <!-- SORT TOEVOEGEN -->
                <div class="my-4 p-4 bg-white rounded-lg">
                    <h1 class="text-lg text-gray-800 dark:text-black">Soort toevoegen</h1>
                    <form action="{{ route('users.inrichtings.createSort') }}" method="post" class="mt-2">
                        @csrf
                        <x-text-input type="text" name="sort_name" field="sort_name" placeholder="Soort..." class="block w-full p-2 border rounded" autocomplete="off" :value="@old('sort_name')"></x-text-input>
                        <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Voeg Soort toe</button>
                    </form>
                </div>
                <!-- SORT TOEVOEGEN -->

                <!-- BRAND TOEVOEGEN -->
                <div class="my-4 p-4 bg-white rounded-lg">
                    <h1 class="text-lg text-gray-800 dark:text-black">Merk toevoegen</h1>
                    <form action="{{ route('users.inrichtings.createBrand') }}" method="post" class="mt-2">
                        @csrf
                        <x-text-input type="text" name="brand_name" field="brand_name" placeholder="Merk..." class="block w-full p-2 border rounded" autocomplete="off" :value="@old('brand_name')"></x-text-input>
                        <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Voeg Merk toe</button>
                    </form>
                </div>
                <!-- BRAND TOEVOEGEN -->

                <!-- EPOCHE TOEVOEGEN -->
                <div class="my-4 p-4 bg-white rounded-lg">
                    <h1 class="text-lg text-gray-800 dark:text-black">Epoche toevoegen</h1>
                    <form action="{{ route('users.inrichtings.createEpoche') }}" method="post" class="mt-2">
                        @csrf
                        <x-text-input type="text" name="epoche_name" field="epoche_name" placeholder="Epoche..." class="block w-full p-2 border rounded" autocomplete="off" :value="@old('epoche_name')"></x-text-input>
                        <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Voeg Epoche toe</button>
                    </form>
                </div>
                <!-- EPOCHE TOEVOEGEN -->

                <!-- OWNER TOEVOEGEN -->
                <div class="my-4 p-4 bg-white rounded-lg">
                    <h1 class="text-lg text-gray-800 dark:text-black">Eigenaar toevoegen</h1>
                    <form action="{{ route('users.inrichtings.createOwner') }}" method="post" class="mt-2">
                        @csrf
                        <x-text-input type="text" name="owner_name" field="owner_name" placeholder="Eigenaar..." class="block w-full p-2 border rounded" autocomplete="off" :value="@old('owner_name')"></x-text-input>
                        <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Voeg Eigenaar toe</button>
                    </form>
                </div>
                <!-- EPOCHE TOEVOEGEN -->

                <!-- COLOR TOEVOEGEN -->
                <div class="my-4 p-4 bg-white rounded-lg">
                    <h1 class="text-lg text-gray-800 dark:text-black">Kleur toevoegen</h1>
                    <form action="{{ route('users.inrichtings.createColor') }}" method="post" class="mt-2">
                        @csrf
                        <x-text-input type="text" name="color" field="color" placeholder="Kleur..." class="block w-full p-2 border rounded" autocomplete="off" :value="@old('color')"></x-text-input>
                        <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Voeg Kleur toe</button>
                    </form>
                </div>
                <!-- COLOR TOEVOEGEN -->

                <!-- CATEGORY TOEVOEGEN -->
                {{-- <div class="my-4 p-4 bg-white rounded-lg">
                    <h1 class="text-lg text-gray-800 dark:text-black">Categorie toevoegen</h1>
                    <form action="/create-categorie" method="post" class="mt-2">
                        @csrf
                        <x-text-input type="text" name="category_name" field="category_name" placeholder="Categorie..." class="block w-full p-2 border rounded" autocomplete="off" :value="@old('category_name')"></x-text-input>
                        <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Voeg categorie toe</button>
                    </form>
                </div>
                 --}}
                <!-- CATEGORY TOEVOEGEN -->

                <a href="{{ route('users.inrichtings.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Terug</a>

            </div>
        </div>
    </div>
</x-app-layout>
