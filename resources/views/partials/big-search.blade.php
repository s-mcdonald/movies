<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">
            Search movie titles now
        </h1>
        <p class="col-md-8 fs-4">
            Search the online dtabase of movies here.
        </p>
        <div class="search-box-wrapper">
            <form method="POST" action="{{ route('search') }}">
                @csrf
                <input name="s" type="text" class="form-control movie-search-bar" value="{{ $phrase }}">
                <button class="btn custom-button" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>