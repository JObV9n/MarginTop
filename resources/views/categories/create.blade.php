<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Form table for category creation -->
            <form method="POST" action="{{route('categories.store')}}">
                @csrf
                <!-- Category Name -->
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-bold text-gray-600">Category Name</label>
                    <input type="text" id="name" name="name" placeholder="Put in your category name." class="border border-gray-300 shadow p-3 w-full rounded mb-">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                </div>
                <!-- Submit button -->
                <button class="align-center block bg-blue-500 text-white font-bold p-4 rounded-lg">Create Category</button>
            </form>

        </div>
    </div>
</x-app-layout>