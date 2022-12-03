@props(['listing'])

<x-card>

    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
            </svg>


            <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('listing.show', $listing->id) }}"
                    class="underline text-gray-900 dark:text-white Came">{{ $listing->project_name }}</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm ">
                {{ Str::limit($listing->description, 250) }}
            </div>
        </div>
        <div class="ml-12 mt-3">
            <ul class="flex">
                <x-listing-tags :tagsCsv="$listing->tags"></x-listing-tags>
            </ul>
        </div>
    </div>
</x-card>
