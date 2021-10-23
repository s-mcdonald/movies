<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">
            {{ __('app.title') }}
        </h1>
        <p class="col-md-8 fs-4">
            {{ __('app.description') }}
        </p>
        <div class="search-box-wrapper">
            <form method="POST" action="{{ route('search') }}">
                @csrf
                <input name="s" type="text" class="form-control movie-search-bar" value="{{ $phrase }}">
                <button class="btn custom-button" type="submit">{{ __('app.search_btn') }}</button>
            </form>
        </div>
    </div>
</div>