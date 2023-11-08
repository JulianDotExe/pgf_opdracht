<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nieuw Object') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

            <!-- @foreach ($errors->all() as $error)
                <p>{{ $error }} </p>
            @endforeach -->
                
            <form action="{{ route('overviews.store') }}"method="post">
                @csrf
                <!-- value nog veranderen en meerdere fields erbij doen -->

                <x-text-input type="text" name="sort_name" field="sort_name" placeholder="Soort..." class="w-full" autocomplete="off" :value="@old('sort_name')"></x-text-input> <br> <br>

                <x-text-input type="text" name="brand_name" field="brand_name" placeholder="Merk..." class="w-full" autocomplete="off" :value="@old('brand_name')"></x-text-input> <br> <br>

                <x-text-input type="text" name="catalogusnr" field="catalogusnr" placeholder="Catalogusnummer..." class="w-full" autocomplete="off" :value="@old('catalogusnr')"></x-text-input> <br> <br>

                <x-text-input type="text" name="epoche_name" field="epoche_name" placeholder="Epoche..." class="w-full" autocomplete="off" :value="@old('epoche_name')"></x-text-input> <br> <br>

                <x-text-input type="text" name="nummer" field="nummer" placeholder="Nummer..." class="w-full" autocomplete="off" :value="@old('nummer')"></x-text-input> <br> <br>

                <x-text-input type="text" name="eigenschappen" field="eigenschappen" placeholder="Eigenschappen..." class="w-full" autocomplete="off" :value="@old('eigenschappen')"></x-text-input> <br> <br>

                <x-text-input type="text" name="owner_name" field="owner_name" placeholder="Eigenaar..." class="w-full" autocomplete="off" :value="@old('owner_name')"></x-text-input> <br> <br>

                <x-text-input type="text" name="color1" field="color2" placeholder="Kleur 1..." class="w-full" autocomplete="off" :value="@old('color1')"></x-text-input> <br> <br>

                <x-text-input type="text" name="color2" field="color2" placeholder="Kleur 2..." class="w-full" autocomplete="off" :value="@old('color2')"></x-text-input> <br> <br>

                <x-text-input type="text" name="bijzonderheden" field="bijzonderheden" placeholder="Bijzonderheden..." class="w-full" autocomplete="off" :value="@old('bijzonderheden')"></x-text-input> <br> <br>

                <x-text-input type="text" name="foto" field="foto" placeholder="Foto..." class="w-full" autocomplete="off" :value="@old('foto')"></x-text-input> <br> <br>

                <a href="{{ route('overviews.index') }}" class="btn btn-primary mb-4">Terug</a> <br> {{-- Terug knop --}}
                <button type="submit" class="btn btn-primary">Opslaan</button>
            </form>


            </div>
        </div>
    </div>
</x-app-layout>