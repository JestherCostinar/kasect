@extends('layout.app')

@section('content')
    <x-card class="p-10 max-w-6xl mx-auto sm:px-6 lg:px-4 mt-24 mx-4 mb-20">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create project
            </h2>
            <p class="mb-4">Create and display your project</p>
        </header>

        <form action="{{ route('listing.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="project_name" class="inline-block text-lg mb-2">Project name <span class="text-red-500">*</span></label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="project_name"
                    value="{{ old('project_name') }}" />
                @error('project_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">Website <span class="text-red-500">*</span></label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                    placeholder="Example: Senior Laravel Developer" value="{{ old('website') }} " />
                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="developer" class="inline-block text-lg mb-2">Develop by: <span class="text-red-500">*</span></label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="developer"
                    placeholder="Example: Remote, Boston MA, etc" value="{{ old('developer') }} " />
                @error('developer')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email <span class="text-red-500">*</span></label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }} " />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="telephone" class="inline-block text-lg mb-2">
                    Contact Number <span class="text-red-500">*</span>
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="telephone"
                    value="{{ old('telephone') }} " />
                @error('telephone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Topics/Tags <span class="text-red-500">*</span>
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc" value="{{ old('tags') }} " />
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Project Logo <span class="text-red-500">*</span>
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Project Description <span class="text-red-500">*</span>
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Tell something about the project..">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded-l py-2 px-4 hover:bg-black float-right hover:text-white-600 hover:border-violet-600 hover:bg-violet-700">
                    Create Project
                </button>

                <a href="/" class="text-white text-sm font-semibold border px-6 py-2 rounded-lg hover:text-black-600 hover:border-gray-500 bg-gray-400"> Back </a>
            </div>
        </form>
    </x-card>
@endsection
