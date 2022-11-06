@extends('layout.app')

@section('content')
    <x-card class="p-10 max-w-6xl mx-auto sm:px-6 lg:px-4 mt-24 mx-4 mb-20">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit project
            </h2>
            <p class="mb-4 underline">{{ $listing->project_name }}</p>
        </header>

        <form action="{{ route('listing.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-6">
                <label for="project_name" class="inline-block text-lg mb-2">Project Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="project_name"
                    value="{{ $listing->project_name }}" />
                @error('project_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">Website</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                    placeholder="Example: Senior Laravel Developer" value="{{ $listing->website }}" />
                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="developer" class="inline-block text-lg mb-2">Develop by:</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="developer"
                     value="{{ $listing->developer }}" />
                @error('developer')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ $listing->email }}" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="telephone" class="inline-block text-lg mb-2">
                    Contact number
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="telephone"
                    value="{{ $listing->telephone }}" />
                @error('telephone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Topics/Tags
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc" value="{{ $listing->tags }}" />
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
                <img class="hidden w-48 mr-6 md:block"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image-available.png') }}"
                    alt="" />

                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Job Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Include tasks, requirements, salary, etc">{{ $listing->description }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded-l py-2 px-4 hover:bg-black float-right hover:text-white-600 hover:border-violet-600 hover:bg-violet-700">
                    Update Gig
                </button>

               <a href="/" class="text-white text-sm font-semibold border px-6 py-2 rounded-lg hover:text-black-600 hover:border-gray-500 bg-gray-400"> Back </a>
            </div>
        </form>
    </x-card>
@endsection
