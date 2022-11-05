@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex">
    <span class="text-gray-600 dark:text-gray-400 text-sm font-semibold mr-2 underline">tags:</span>
    @foreach ($tags as $tag)
        <li class="flex items-center justify-center bg-violet-400 text-white rounded-xl py-1 px-3 mr-2 text-xs @if ($tag == 'Laravel')
            bg-red-400
        @elseif ($tag == 'Tailwind')
            bg-teal-400
        @elseif ($tag == 'Vue')
            bg-emerald-400	
        @elseif ($tag == 'Alpine')
            bg-cyan-500	
        @endif"><a
                href="/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>
