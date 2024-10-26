<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Form table for category creation -->
            <form method="POST" action="{{ route('categories.update', $category) }}">
                @csrf
                @method('PUT') <!-- Include this to specify the PUT method for updating -->
                <!-- Title -->
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-bold text-gray-600">Name</label>
                    <input type="text" id="name" name="name" value="{{old('name',$category->name)}}" class="border border-gray-300 shadow p-3 w-full rounded mb-">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                </div>
        
                <button class="block bg-blue-500 text-white font-bold p-4 align-center rounded-lg">Update</button>

            </form>
        </div>
    </div>
</x-app-layout>