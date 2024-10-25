<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Attendee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Form table for attendee creation -->
            <form method="POST" action="{{ route('attendees.update', $attendee) }}">
                @csrf
                @method('PUT') <!-- Include this to specify the PUT method for updating -->
                <!-- Title -->
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-bold text-gray-600">Name</label>
                    <input type="text" id="name" name="name" value="{{old('name',$attendee->name)}}" class="border border-gray-300 shadow p-3 w-full rounded mb-">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                </div>
                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block mb-2 font-bold text-gray-600">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email',$attendee->email) }}" class="border border-gray-300 shadow p-3 w-full rounded mb-">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>
                <!-- Event -->
                <div class="mb-5">
                    <label for="event_id" class="block mb-2 font-bold text-gray-600">Event</label>
                    <select name="event_id" id="event_id" class="border border-gray-300 shadow p-3 w-full rounded mb-">
                        @foreach ($events as $event)
                        <option value="{{ $event->id }}"
                            {{ $event->id == $oldEventId ? 'selected' : '' }}>
                            {{ $event->title }}
                        </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('event_id')" class="mt-2" />

                </div>
                <button class="block bg-blue-500 text-white font-bold p-4 align-center rounded-lg">Update</button>

            </form>
        </div>
    </div>
</x-app-layout>