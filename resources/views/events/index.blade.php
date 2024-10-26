<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (request()->has('message'))
            <p class="alert alert-success mt-4">
                {{ request()->get('message') }}
            </p>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{route('events.create')}}" class="underline">Add new Event</a>
                </div>


            </div>

            <!-- table with Event details -->

            <table class="w-full text-sm text-left text-gray-500 border border-slate-400 table-auto mt-4">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3 border border-slate-400 ">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 border border-slate-400">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3 border border-slate-400">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3 border border-slate-400">
                            Location
                        </th>
                        <th scope="col" class="px-6 py-3 border border-slate-400">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3 border border-slate-400">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr class="bg-white">
                        <th scope="row" class="px-6 py-4 border  font-medium text-gray-900 whitespace-nowrap">
                            <a href="{{route('events.show',$event)}}" class="underline hover:text-blue-600 transition-colors duration-300">  {{ $event->title }}</a>
                        </th>
                        <td class="px-6 py-4 border">
                            <a href="{{route('categories.show',$event->category)}}" class="underline hover:text-blue-600 transition-colors duration-300">  {{ $event->category->name }}</a>
                        </td>
                        <td class="px-6 py-4 border">
                            {{ $event->description }}
                        </td>
                        <td class="px-6 py-4 border ">
                            {{ $event->location }}
                        </td>
                        <td class="px-6 py-4 border ">
                            {{ $event->date }}
                        </td>
                        <td class="px-6 py-4 border ">
                            <a href="{{route('events.edit',$event)}}"> <u>Edit</u></a> /
                            <form action="{{route('events.destroy',$event)}}" method="POST" class="inline"
                                onsubmit="confirm('Are u sure to delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 underline">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="mt-4"> {{ $events->links()}}</p>
        </div>
    </div>
</x-app-layout>