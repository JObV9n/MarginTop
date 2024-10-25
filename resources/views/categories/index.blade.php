<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
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
                    <a href="{{route('categories.create')}}" class="underline">Add new Category</a>
                </div>


            </div>

            <!-- table with Category details -->

            <table class="w-full text-sm text-left text-gray-500 border border-slate-400 table-auto mt-4">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3 border border-slate-400 ">
                            Category Title
                        </th>   
                        <th scope="col" class="px-6 py-3 border border-slate-400">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="bg-white">
                        <th scope="row" class="px-6 py-4 border  font-medium text-gray-900 whitespace-nowrap">
                            {{ $category->name }}
                        </th>
                        <td class="px-6 py-4 border ">
                            <a href="{{route('categories.edit',$category)}}"> <u>Edit</u></a> /
                            <form action="{{route('categories.destroy',$category)}}" method="POST" class="inline"
                                onsubmit="confirm('Are u sure to delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 underline">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="mt-4"> {{ $categories->links()}}</p>
        </div>
    </div>
</x-app-layout>