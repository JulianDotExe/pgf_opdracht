<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nieuw News') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="titel" class="block text-sm font-medium text-gray-700"> Titel: </label>
                    <x-text-input type="text" name="titel" id="titel" placeholder="Titel..." class="w-full" autocomplete="off"></x-text-input>
                    
                    <label for="catagory_id" class="pt-3 block text-sm font-medium text-gray-700"> Categorie: </label>
                    <select name="categories_id" id="categories_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                        <option class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" selected disabled hidden>Choose a category...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>

                    <label for="inhoud" class="pt-3 block text-sm font-medium text-gray-700"> Inhoud: </label>
                    <x-text-input type="text" name="inhoud" placeholder="Inhoud..." class="w-full" autocomplete="off"></x-text-input>
                    
                    
                    <label for="auteur" class="pt-3 block text-sm font-medium text-gray-700"> Auteur: </label>
                    <x-text-input type="text" name="auteur" placeholder="Auteur..." class="w-full" autocomplete="off"></x-text-input>
                    
                    <label for="link" class="pt-3 block text-sm font-medium text-gray-700"> URL/Link: </label>
                    <x-text-input type="text" name="link" placeholder="Url..." class="w-full" autocomplete="off"></x-text-input>
                    
                    <x-button type="submit" class="px-4 py-2 text-slate-50 hover:bg-blue-600 bg-blue-500 rounded-md mt-4">Create News</x-button> {{-- deze knop doet het niet ofzo --}}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
