@extends('templates.movie')

@section('main-content')

    <div class="outer-wrapper">
        <img src="{{ $movie->poster }}" alt="" style="height:300px">
        <div class="movie-content-wrapper">
            <h2><span class="searchable-content">{{ $movie->title }}</span> ({{ $movie->year }})</h2>
            <div class="tags">
                <span class="rating">{{ $movie->rated }}</span>
                <span class="rating">{{ $movie->imdb_score }}</span>
                <span class="rating">{{ $movie->runtime }}</span>
                <span class="rating">{{ $movie->genre }}</span>
            </div>
            <div class="description searchable-content">
                {{ $movie->plot }}
            </div>
            <div class="toolbar">
                <a href="{{ route('search-get') }}" class="btn btn-default">Search For Movies</a>
            </div>            
        </div>
    </div>

    @if(!empty($phrase))
        <script type="text/javascript">
            var userphrase = '{{ $phrase }}';
        </script>
    @endif

@endsection