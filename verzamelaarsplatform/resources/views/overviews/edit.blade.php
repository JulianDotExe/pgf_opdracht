<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Collectie') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <!-- @foreach ($errors->all() as $error)
                    <p>{{ $error }} </p>
                @endforeach -->

                <form action="{{ route('overviews.update', $overview) }}" method="post" onsubmit="return confirmSaveChanges()">
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
                    
                    <a href="#" class="bg-blue-500 text-white py-1 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out" onclick="editOpenConfirmationPopup(event)">Terug</a>
                    <button type="submit" class="bg-blue-500 text-white py-1 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Opslaan</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Confirmation popup -->
    <div id="confirmationPopup" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center" style="display: none;">
        <div class="bg-white p-8 rounded-md shadow-md w-1/2 flex flex-col items-center">
            <p class="text-lg mb-4 text-center">Weet je zeker dat je de wijzigingen wilt verlaten?<br>
                Niet-opgeslagen wijzigingen gaan verloren.</p>
            <div class="flex justify-center w-full">
                <a href="#" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-700 transition duration-300 ease-in-out" onclick="editCloseConfirmationPopup()">Annuleren</a>
                <a href="{{ route('overviews.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300 ease-in-out">Bevestigen</a>
            </div>
        </div>
    </div>

    <script>
        function confirmSaveChanges() {
            var terugButton = document.activeElement;
            if (terugButton.tagName === 'A' && terugButton.getAttribute('href') === '#') {
                document.getElementById('confirmationPopup').style.display = 'flex';
                return false;
            }
            return true;
        }

        function editOpenConfirmationPopup(event) {
            event.preventDefault();
            document.getElementById('confirmationPopup').style.display = 'flex';
        }

        function editCloseConfirmationPopup() {
            document.getElementById('confirmationPopup').style.display = 'none';
        }
    </script>
</x-app-layout>
