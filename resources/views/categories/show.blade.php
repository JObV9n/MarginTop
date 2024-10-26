<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Title -->
            
            <div class="mb-5">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-gray-100 border-b text-left">Category Name</th>
                            <th class="px-4 py-2 bg-gray-600 border-b">Events</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="px-4 py-2 bg-gray-100 border-b text-left">{{ $category->name }}</th>
                            @forelse($category->events as $event)
                              <td class="px-1 py-1 bg-gray-400 border-b"><a href="{{route('events.show',$event)}}" class="underline hover:text-blue-600 transition-colors duration-300"> {{$event->title}}</a></td>
                            @empty
                              <td class="px-1 py-1 bg-gray-400 border-b text-center">No events found</td>
                            @endforelse
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
</x-app-layout>
