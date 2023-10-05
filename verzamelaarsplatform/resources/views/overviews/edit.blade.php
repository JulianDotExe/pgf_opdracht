<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit object') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <!-- @foreach ($errors->all() as $error)
                    <p>{{ $error }} </p>
                @endforeach -->

                <form action="{{ route('overviews.update', $overview) }}" method="post">
                    @csrf
                    @method('PUT') {{-- Voeg deze regel toe om een PUT-verzoek te maken voor het bijwerken van de gegevens --}}
                    <!-- Voeg de oude waarden toe aan de invoervelden -->
                    <x-text-input type="text" name="sort" field="sort" placeholder="Soort..." class="w-full" autocomplete="off" :value="$overview->sort"></x-text-input> <br> <br>

                    <x-text-input type="text" name="brand" field="brand" placeholder="Merk..." class="w-full" autocomplete="off" :value="$overview->brand"></x-text-input> <br> <br>

                    <x-text-input type="text" name="catalogusnr" field="catalogusnr" placeholder="Catalogusnummer..." class="w-full" autocomplete="off" :value="$overview->catalogusnr"></x-text-input> <br> <br>

                    <x-text-input type="text" name="epoche" field="epoche" placeholder="Epoche..." class="w-full" autocomplete="off" :value="$overview->epoche"></x-text-input> <br> <br>

                    <x-text-input type="text" name="nummer" field="nummer" placeholder="Nummer..." class="w-full" autocomplete="off" :value="$overview->nummer"></x-text-input> <br> <br>

                    <x-text-input type="text" name="eigenschappen" field="eigenschappen" placeholder="Eigenschappen..." class="w-full" autocomplete="off" :value="$overview->eigenschappen"></x-text-input> <br> <br>

                    <x-text-input type="text" name="owner" field="owner" placeholder="Eigenaar..." class="w-full" autocomplete="off" :value="$overview->owner"></x-text-input> <br> <br>

                    <x-text-input type="text" name="color1" field="color1" placeholder="Kleur 1..." class="w-full" autocomplete="off" :value="$overview->color1"></x-text-input> <br> <br>

                    <x-text-input type="text" name="color2" field="color2" placeholder="Kleur 2..." class="w-full" autocomplete="off" :value="$overview->color2"></x-text-input> <br> <br>

                    <x-text-input type="text" name="bijzonderheden" field="bijzonderheden" placeholder="Bijzonderheden..." class="w-full" autocomplete="off" :value="$overview->bijzonderheden"></x-text-input> <br> <br>

                    <x-text-input type="text" name="foto" field="foto" placeholder="Foto..." class="w-full" autocomplete="off" :value="$overview->foto"></x-text-input> <br> <br>
                    
                    <a href="{{ route('overviews.index') }}" class="btn btn-primary mb-4">Terug</a> <br> {{-- Terug knop --}}
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
