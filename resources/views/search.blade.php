@extends('templates.search')

@section('main-content')

    @if($show)
        @include('partials.big-search')
    @endif

    <div class="results-container">

        @if(isset($results))
            @foreach ($results as $movie)
                @include('partials.movie-result', ['movie' => $movie])
            @endforeach
        @endif

    </div>

    @include('partials.pagination', ['phrase' => $phrase, 'paginator' => $paginator])

@endsection