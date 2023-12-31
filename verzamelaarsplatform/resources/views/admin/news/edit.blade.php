<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit News') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <!-- @foreach ($errors->all() as $error)
                    <p>{{ $error }} </p>
                @endforeach -->

                <form action="{{ route('admin.news.update', $news->artikel_id) }}" method="post" onsubmit="return confirmSaveChanges()">
                    @csrf
                    @method('PUT') 
                    <label for="titel" class="block text-sm font-medium text-gray-700"> Titel: </label>
                    <x-text-input type="text" name="titel" id="titel" placeholder="Titel..." class="w-full" autocomplete="off" :value="$news->titel"></x-text-input>
                    <label for="catagory_id" class="pt-3 block text-sm font-medium text-gray-700"> Categorie: </label>
                    <select name="categories_id" id="categories_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $news->categories_id) selected @endif>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="inhoud" class="pt-3 block text-sm font-medium text-gray-700"> Inhoud: </label>
                    <x-text-input type="text" name="inhoud" placeholder="Inhoud..." class="w-full" autocomplete="off"  :value="$news->inhoud"></x-text-input>
                    <label for="auteur" class="pt-3 block text-sm font-medium text-gray-700"> Auteur: </label>
                    <x-text-input type="text" name="auteur" placeholder="Auteur..." class="w-full" autocomplete="off"  :value="$news->auteur"></x-text-input>
                    <label for="link" class="pt-3 block text-sm font-medium text-gray-700"> URL/Link: </label>
                    <x-text-input type="text" name="link" placeholder="Url..." class="w-full" autocomplete="off"  :value="$news->link"></x-text-input><br><br>
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
                <a href="{{ route('admin.news.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300 ease-in-out">Bevestigen</a>
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
