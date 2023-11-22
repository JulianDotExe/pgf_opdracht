<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nieuwe collectie') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

            <!-- @foreach ($errors->all() as $error)
                <p>{{ $error }} </p>
            @endforeach -->
                
            <form action="{{ route('overviews.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Dropdown voor studenten -->
                <select name="sort_id" id="sort_id" class="w-full" required>
                    <option value="">Kies een soort</option> 
                    @foreach ($sorts as $sort)
                        <option value="{{ $sort->id }}">{{ $sort->sort_name }}</option>
                    @endforeach
                </select>

                    <br> <br>

                <select name="brand_id" id="brand_id" class="w-full" required>
                    <option value="">Kies een merk</option> 
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                    @endforeach
                </select>

                    <br> <br>

                <x-text-input type="text" name="catalogusnr" field="catalogusnr" placeholder="Catalogusnummer..." class="w-full" autocomplete="off" :value="@old('catalogusnr')" style="background-color: white;" required></x-text-input> 
                
                    <br> <br>

                <select name="epoche_id" id="epoche_id" class="w-full" required>
                    <option value="">Kies een epoche</option> 
                    @foreach ($epoches as $epoche)
                        <option value="{{ $epoche->id }}">{{ $epoche->epoche_name }}</option>
                    @endforeach
                </select>

                    <br> <br>

                <x-text-input type="text" name="nummer" field="nummer" placeholder="Nummer..." class="w-full" autocomplete="off" :value="@old('nummer')" style="background-color: white;" required></x-text-input>
                
                    <br> <br>

                <x-text-input type="text" name="eigenschappen" field="eigenschappen" placeholder="Eigenschappen..." class="w-full" autocomplete="off" :value="@old('eigenschappen')" style="background-color: white;" required></x-text-input> 
                
                    <br> <br>

                <select name="owner_id" id="owner_id" class="w-full" required>
                    <option value="">Kies een eigenaar</option> 
                    @foreach ($owners as $owner)
                        <option value="{{ $owner->id }}">{{ $owner->owner_name }}</option>
                    @endforeach
                </select>

                    <br> <br>

                <select name="color1_id" id="color1_id" class="w-full" required>
                    <option value="">Kies kleur 1</option> 
                    @foreach ($colors1 as $color1)
                        <option value="{{ $color1->id }}">{{ $color1->color1 }}</option>
                    @endforeach
                </select>

                    <br> <br>

                <select name="color2_id" id="color2_id" class="w-full" required>
                    <option value="">Kies kleur 2</option> 
                    @foreach ($colors2 as $color2)
                        <option value="{{ $color2->id }}">{{ $color2->color2 }}</option>
                    @endforeach
                </select>

                    <br> <br>

                <x-text-input type="text" name="bijzonderheden" field="bijzonderheden" placeholder="Bijzonderheden..." class="w-full" autocomplete="off" :value="@old('bijzonderheden')" style="background-color: white;"></x-text-input> 

                    <br> <br>

                    <x-text-input type="file" name="foto" field="foto" class="w-full" style="background-color: white;" required></x-text-input>
                <br> <br>
                <a href="{{ route('overviews.index') }}" class="bg-blue-500 text-white py-1 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Terug</a>
                <button type="submit" class="bg-blue-500 text-white py-1 px-2 rounded inline-block hover:bg-blue-700 transition duration-300 ease-in-out">Opslaan</button>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>