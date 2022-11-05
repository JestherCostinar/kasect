@extends('layout.app')

@section('content')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 md:space-y-0 mx-4">

        @unless(count($listings) == 0)
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        @else
            <p>No Listing found</p>
        @endunless

    </div>

    <div class=" p-4">
        {{ $listings->links() }}
    </div>

@endsection
