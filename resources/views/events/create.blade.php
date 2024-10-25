<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Form table for Event creation -->
            <form method="POST" action="{{route('events.store')}}">
                @csrf
                <!-- Event Title -->
                <div class="mb-5">
                    <label for="event_title" class="block mb-2 font-bold text-gray-600">Event Title</label>
                    <input type="text" id="event_title" name="event_title" placeholder="Put in your event title." class="border border-gray-300 shadow p-3 w-full rounded mb-">
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />

                </div>

                <!-- Event Category -->
                <div class="mb-5">
                    <label for="event_id" class="block mb-2 font-bold text-gray-600">Event Category</label>
                    <select name="event_id" id="event_id" class="border border-gray-300 shadow p-3 w-full rounded mb-">
                        <option value="">Select Event</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('event_id')" class="mt-2" />
                </div>

                <!-- Event Description -->
                <div class="mb-5">
                    <label for="event_description" class="block mb-2 font-bold text-gray-600">Event Description</label>
                    <input type="text" id="event_description" name="event_description" placeholder="Put in your event description." class="border border-gray-300 shadow p-3 w-full rounded mb-">
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Event Location -->
                <div class="mb-5">
                    <label for="event_location" class="block mb-2 font-bold text-gray-600">Event Location</label>
                    <input type="text" id="event_location" name="event_location" placeholder="Put in your event location." class="border border-gray-300 shadow p-3 w-full rounded mb-">
                    <x-input-error :messages="$errors->get('location')" class="mt-2" /> 
                </div>

                <!-- Event Date -->
                <div class="mb-5">
                    <label for="event_date" class="block mb-2 font-bold text-gray-600">Event Date</label>
                    <input type="date" id="event_date" name="event_date" placeholder="Put in your event date." class="border border-gray-300 shadow p-3 w-full rounded mb-">
                </div>
                <!-- Submit button -->
                <button class="align-center block bg-blue-500 text-white font-bold p-4 rounded-lg">Create Event</button>
            </form>

        </div>
    </div>
</x-app-layout>