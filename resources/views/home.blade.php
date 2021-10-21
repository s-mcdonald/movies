@extends('templates.default')

@section('main-content')

    @include('partials.big-search')

    <div class="results-container">
        @include('partials.movie-result')
        {{-- @foreach ($collection as $item)
        @endforeach --}}
    </div>

@endsection