<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nieuw Evenement') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.events.store') }}" method="post">
                    @csrf
                    <label for="event_date" class="block text-sm font-medium text-gray-700"> Datum: </label>
                    <x-text-input type="text" name="event_date" id="event_date" placeholder="dd/mm/yyyy" class="w-full" autocomplete="off"></x-text-input>
                    <label for="event_name" class="pt-3 block text-sm font-medium text-gray-700"> Naam: </label>
                    <x-text-input type="text" name="event_name" placeholder="Name..." class="w-full" autocomplete="off"></x-text-input>
                    <label for="catagory_id" class="pt-3 block text-sm font-medium text-gray-700"> Categorie: </label>
                    <select name="catagory_id" id="catagory_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                        <option class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" selected disabled hidden>Choose a category...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <label for="locatie" class="pt-3 block text-sm font-medium text-gray-700"> Locatie: </label>
                    <x-text-input type="text" name="locatie" placeholder="Location..." class="w-full" autocomplete="off"></x-text-input>
                    <label for="link" class="pt-3 block text-sm font-medium text-gray-700"> URL/Link: </label>
                    <x-text-input type="text" name="link" placeholder="Url..." class="w-full" autocomplete="off"></x-text-input>
                    <label for="beschrijving" class="pt-3 block text-sm font-medium text-gray-700"> Beschrijving: </label>
                    <x-textarea name="beschrijving" rows="5" placeholder="Description..." class="w-full" autocomplete="off"></x-textarea>
                    <div class="sm:col-span-6 pt-5">
                        <button type="submit" class="px-4 py-2 text-slate-50 hover:bg-blue-600 bg-blue-500 rounded-md">Create Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>

    document.getElementById('event_date').addEventListener('input', function() {
        // Get the entered value
        let enteredDate = this.value;

        // Check if the entered date matches the dd/mm/yyyy format (using a regular expression)
        let datePattern = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
        if (datePattern.test(enteredDate)) {
            // If it matches, split the date components
            let dateParts = enteredDate.split('/');
            // Rearrange the date in yyyy-mm-dd format (suitable for storing in a database or using in PHP)
            let formattedDate = dateParts[2] + '-' + dateParts[1].padStart(2, '0') + '-' + dateParts[0].padStart(2, '0');
            // Update the input value with the formatted date
            this.value = formattedDate;
        }
    });

</script>