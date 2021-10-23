<div class="result-item">
    <img src="{{ $movie->Poster }}" alt="{{ $movie->Title }} Poster">
    <h2>
        <a href="{{ route('movie', ['movie' => $movie->imdbID,  'p' => $phrase]) }}">
            {{ $movie->Title }}
            <span class="year">({{ $movie->Year }})</span>
        </a>
    </h2>
</div>