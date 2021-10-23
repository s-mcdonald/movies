@extends('templates.home')

@section('main-content')

    {{ __('app.welcome') }}
    <p>
        Start a new <a href="{{ route('search-get') }}">Search</a>
    </p>

@endsection