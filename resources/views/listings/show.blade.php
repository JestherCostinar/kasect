@extends('layout.app')

@section('content')
    @include('partials._search')
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4 mb-20">
        <x-card class="p-24">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="hidden w-full mr-6 md:block mb-8"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
                    alt="" />

                <h3 class="text-2xl mb-2 font-bold uppercase">{{ $listing->project_name }}</h3>
                <div class="text-sm mb-4 text-blue-500 underline">{{ $listing->website }}</div>
                <ul class="flex mb-6">
                    <span class="text-gray-600 dark:text-gray-400 text-sm font-semibold mr-2 underline"></span>
                    @php
                        $tags = explode(',', $listing->tags);
                    @endphp

                    @foreach ($tags as $tag)
                        <li
                            class="flex items-center justify-center bg-violet-400 text-white rounded-xl py-1 px-3 mr-2 text-xs @if ($tag == 'Laravel') bg-red-400
                        @elseif ($tag == 'Tailwind')
                            bg-teal-400
                        @elseif ($tag == 'Vue')
                            bg-emerald-400	
                        @elseif ($tag == 'Alpine')
                            bg-cyan-500
                        @elseif ($tag == 'HTML')
                            bg-orange-600
                        @elseif ($tag == 'CSS')
                            bg-blue-500
                        @elseif ($tag == 'JavaScript')
                            bg-yellow-500
                        @elseif ($tag == 'Java')
                            bg-red-400
                        @elseif ($tag == 'Python')
                            bg-yellow-400
                        @elseif ($tag == 'PHP')
                            bg-blue-400 @endif">
                            <a href="/?tag={{ $tag }}">{{ $tag }}</a>
                        </li>
                    @endforeach
                </ul>

                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-2xl font-bold mb-4">
                        Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p class="text-sm text-left indent-8"> {{ $listing->description }}
                        </p>



                    </div>
                    <div class="bg-white py-5 sm:grid-cols-3">
                        {{-- <div class="px-4 py-5 sm:px-6 ">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 ">File Management System</h3>
                        </div> --}}
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-6 sm:mt-0">
                            <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                                @foreach ($files as $file)
                                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                        <div class="flex w-0 flex-1 items-center">
                                            <!-- Heroicon name: mini/paper-clip -->
                                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-2 w-0 flex-1 truncate">{{ $file->file_name }}</span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            <a href=" {{ asset('storage/' . $file->file_path) }}" download
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </dd>
                    </div>

                    <div class="flex space-x-2 justify-start">
                        <a href="https://www.linkedin.com/in/jesther-costinar/" type="button"
                            class="inline-block px-6 py-2.5 bg-slate-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-slate-800 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-slate-800 active:shadow-lg transition duration-150 ease-in-out">GitHub</a>
                        <a href="https://github.com/" type="button"
                            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">LinkedIn</a>
                        <a href="https://jesthercostinar.github.io/jesthercostinar/" type="button"
                            class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">Website</a>
                    </div>
                </div>

            </div>
        </x-card>

        @if ($listing->user_id == Auth::id())
            <x-card class="mt-4 p-2 flex space-x-6">
                <a href="/listings/{{ $listing->id }}"><i class="fa-solid fa-pencil">Edit</i></a>
                <form action="{{ route('listing.destroy', $listing->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash">Delete</i></button>
                </form>
            </x-card>
        @endauth

</div>
@endsection
