<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Attendee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Title -->
            <div class="mb-5">
                <label for="name" class="block mb-2 font-bold text-gray-600">Name</label>
                <p class="text-gray-600 font-bold">{{$attendee->name}}</p>

            </div>
            <!-- Email -->
            <div class="mb-5">
                <label for="email" class="block mb-2 font-bold text-gray-600">Email</label>
                <p class="text-gray-600 font-bold">{{$attendee->email}}</p>

            </div>
            <!-- Event Title-->
            <div class="mb-5">
                <label for="event_id" class="block mb-2 font-bold text-gray-600">Event</label>
                <p class="text-gray-600 font-bold">{{$attendee->event->title}}</p>

            </div>
        </div>
</x-app-layout>