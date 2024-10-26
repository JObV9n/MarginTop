<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Title -->
            <div class="mb-5">
                <label for="title" class="block mb-2 font-bold text-gray-600"><u>Title</u></label>
                <p class="text-gray-600 font-bold">{{$event->title}}</p>

            </div>
            <!-- Description -->
            <div class="mb-5">
                <label for="description" class="block mb-2 font-bold text-gray-600"><u>Description</u></label>
                <p class="text-gray-600 font-bold">{{$event->description}}</p>

            </div>
            <!-- Category -->
            <div class="mb-5">
                <label for="category_id" class="block mb-2 font-bold text-gray-600"><u>Category</u></label>
                <p class="text-gray-600 font-bold">{{$event->category->name}}</p>

            </div>

            <!-- location -->
            <div class="mb-5">
                <label for="location" class="block mb-2 font-bold text-gray-600"><u>Location</u></label>
                <p class="text-gray-600 font-bold">{{$event->location}}</p>

            </div>
            <!-- date -->
            <div class="mb-5">
                <label for="date" class="block mb-2 font-bold text-gray-600"><u>Date</u></label>
                <p class="text-gray-600 font-bold">{{$event->date}}</p>

            </div>
        </div>
</x-app-layout>