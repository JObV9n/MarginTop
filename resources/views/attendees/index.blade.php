<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
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
                    <a href="{{route('attendees.create')}}" class="underline">Add new Attendee</a>
                </div>
            </div>

            <!-- table with Attendeep details -->

            <table class="w-full text-sm text-left text-gray-500 border border-slate-400 table-auto mt-4">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3 border border-slate-400 ">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 border border-slate-400">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 border border-slate-400">
                            Event Name
                        </th>
                        <th scope="col" class="px-6 py-3 border border-slate-400">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendees as $attendee)
                    <tr class="bg-white">
                        <th scope="row" class="px-6 py-4 border  font-medium text-gray-900 whitespace-nowrap">
                        <a href="{{route('attendees.show',$attendee)}}" class="underline hover:text-blue-600 transition-colors duration-300">{{ $attendee->name }}</a>
                        </th>
                        <td class="px-6 py-4 border">
                            {{ $attendee->email }}
                        </td>
                        <td class="px-6 py-4 border ">
                           {{ $attendee->event->title}}
                        </td>
                        <td class="px-6 py-4 border ">
                            <a href="{{route('attendees.edit',$attendee)}}"> <u>Edit</u></a> /
                            <form action="{{route('attendees.destroy',$attendee)}}" method="POST" class="inline"
                                onsubmit="confirm('Are u sure to delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="mt-4"> {{ $attendees->links()}}</p>
        </div>
    </div>
</x-app-layout>