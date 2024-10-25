<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Form table for Attendee creation -->
            <form method="POST" action="{{route('attendees.store')}}">
                @csrf
                <!-- Attendee Name -->
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-bold text-gray-600">Attendee Name</label>
                    <input type="text" id="name" name="name" placeholder="Put in your attendee name." class="border border-gray-300 shadow p-3 w-full rounded mb-">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                </div>

                <!-- Event Name -->
                <div class="mb-5">
                    <label for="event_id" class="block mb-2 font-bold text-gray-600">Event Name</label>
                    <select name="event_id" id="event_id" class="border border-gray-300 shadow p-3 w-full rounded mb-">
                        <option value="">Select Event</option>
                        @foreach ($events as $event)
                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('event_id')" class="mt-2" />

                </div>

                <!-- Event Date -->
                <div class="mb-5">
                    <label for="event_date" class="block mb-2 font-bold text-gray-600">Event Date</label>
                    <p id="event_date" class="text-gray-600 font-bold"></p>

                </div>
                <!-- Submit button -->
                <button class="align-center block bg-blue-500 text-white font-bold p-4 rounded-lg">Create Attendee</button>
            </form>

        </div>
    </div>
    @push('scripts')
    <script>
        document.getElementById('event_id').addEventListener('change', function(){
            const eventId = this.value;
            const eventDate = document.getElementById('event_date');
            if (eventId){
                fetch(`/events/${eventId}`)
                .then(response => response.json())
                .then(data => eventDate.innerHTFML = data.date);
            }
            else{
                eventDate.innerHTML = '';
                console.log('No event selected');
            }
        });
    </script>
    @endpush
</x-app-layout>