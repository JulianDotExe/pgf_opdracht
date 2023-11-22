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

                <form action="{{ route('overviews.update', $overview) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Voeg de oude waarden toe aan de invoervelden -->

                    <!-- Dropdown for sort -->
                    <select name="sort_id" id="sort_id" class="w-full" required>
                        <option value="">Kies een soort</option> 
                        @foreach ($sorts as $sort)
                            <option value="{{ $sort->id }}" {{ $overview->sort_id == $sort->id ? 'selected' : '' }}>
                                {{ $sort->sort_name }}
                            </option>
                        @endforeach
                    </select>
                    <br> <br>

                    <!-- Dropdown for brand -->
                    <select name="brand_id" id="brand_id" class="w-full" required>
                        <option value="">Kies een merk</option> 
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $overview->brand_id == $brand->id ? 'selected' : '' }}>
                                {{ $brand->brand_name }}
                            </option>
                        @endforeach
                    </select>
                    <br> <br>

                    <x-text-input type="text" name="catalogusnr" field="catalogusnr" placeholder="Catalogusnummer..." class="w-full" autocomplete="off" :value="$overview->catalogusnr" style="background-color: white; color: black;"></x-text-input> <br> <br>

                    <select name="epoche_id" id="epoche_id" class="w-full" required>
                        <option value="">Kies een merk</option> 
                        @foreach ($epoches as $epoche)
                            <option value="{{ $epoche->id }}" {{ $overview->epoche_id == $epoche->id ? 'selected' : '' }}>
                                {{ $epoche->epoche_name }}
                            </option>
                        @endforeach
                    </select>
                    <br> <br>

                    <x-text-input type="text" name="nummer" field="nummer" placeholder="Nummer..." class="w-full" autocomplete="off" :value="$overview->nummer" style="background-color: white; color: black;"></x-text-input> <br> <br>

                    <x-text-input type="text" name="eigenschappen" field="eigenschappen" placeholder="Eigenschappen..." class="w-full" autocomplete="off" :value="$overview->eigenschappen" style="background-color: white; color: black;"></x-text-input> <br> <br>

                    <select name="owner_id" id="owner_id" class="w-full" required>
                        <option value="">Kies een merk</option> 
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}" {{ $overview->owner_id == $owner->id ? 'selected' : '' }}>
                                {{ $owner->owner_name }}
                            </option>
                        @endforeach
                    </select>
                    <br> <br>

                    <select name="color1_id" id="color1_id" class="w-full" required>
                        <option value="">Kies een merk</option> 
                        @foreach ($colors1 as $color1)
                            <option value="{{ $color1->id }}" {{ $overview->color1_id == $color1->id ? 'selected' : '' }}>
                                {{ $color1->color1 }}
                            </option>
                        @endforeach
                    </select>
                    <br> <br>

                    <select name="color2_id" id="color2_id" class="w-full" required>
                        <option value="">Kies een merk</option> 
                        @foreach ($colors2 as $color2)
                            <option value="{{ $color2->id }}" {{ $overview->color2_id == $color2->id ? 'selected' : '' }}>
                                {{ $color2->color2 }}
                            </option>
                        @endforeach
                    </select>
                    <br> <br>

                    <x-text-input type="text" name="bijzonderheden" field="bijzonderheden" placeholder="Bijzonderheden..." class="w-full" autocomplete="off" :value="$overview->bijzonderheden" style="background-color: white; color: black;"></x-text-input> <br> <br>

                    <x-text-input type="file" name="foto" field="foto" class="w-full" style="background-color: white; color: black;"></x-text-input>
                    <br> <br>                    
                    <a href="{{ route('overviews.index') }}" class="bg-blue-500 text-white py-1 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Terug</a>
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
