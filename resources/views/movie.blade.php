@extends('templates.movie')

@section('main-content')

    <div class="outer-wrapper">
        <img src="{{ $movie->poster }}" alt="" style="height:300px">
        <div class="movie-content-wrapper ">
            <h2><span class="searchable-content">{{ $movie->title }}</span> ({{ $movie->year }})</h2>
            <span class="rating">{{ $movie->rated }}</span>
            <span class="rating">{{ $movie->runtime }}</span>
            <span class="rating">{{ $movie->genre }}</span>
            <div class="description searchable-content">
                {{ $movie->plot }}
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var userphrase = '{{ $phrase }}';
    </script>

@endsection