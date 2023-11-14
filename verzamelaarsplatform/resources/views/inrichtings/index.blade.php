<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inrichtings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('inrichtings.create') }}" class="bg-blue-500 text-white py-2 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">+ Nieuwe inrichting</a>
            
            
        </div>
    </div>
</x-app-layout>