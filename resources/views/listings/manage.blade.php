@extends('layout.app')

@section('content')
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Project
            </h1>
        </header>

        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full border-2 my-6">
                            <thead class="bg-gray-200 border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        #
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Project Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Website
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @unless($listings->isEmpty())
                                    @foreach ($listings as $listing)                                       
                                        <tr class="bg-white-100 border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $listing->project_name }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <a class="underline text-blue-500" href="{{ $listing->website }}">{{ $listing->website }}</a>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <a class="text-green-500 underline font-bold uppercase" href="{{ route('listing.edit', $listing->id) }}">Edit</a> | 
                                                <form action="{{ route('listing.destroy', $listing->id) }}" method="post" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-500 underline font-bold uppercase">Delete</button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                </tbody>
                                @endforeach
                            @else
                                <tr class="border-gray-300">
                                    <td class="px-4 py-8 border-t border-gray-300 text-lg">
                                        <p class="text-center ">No Listings Found</p>
                                    </td>
                                </tr>
                            @endunless
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
@endsection
