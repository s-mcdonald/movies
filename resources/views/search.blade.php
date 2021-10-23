@extends('templates.search')

@section('main-content')

    @include('partials.big-search')

    <div class="results-container">

        @if(!empty($results))
            @foreach ($results->Search as $item)
                @include('partials.movie-result', ['movie' => $item])
            @endforeach
        @endif

    </div>

@endsection