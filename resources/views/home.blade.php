@extends('templates.default')

@section('main-content')

    Welcome to the Movie App
    <p> 
        Start a new <a href="{{ route('search-get') }}">Search</a> 
    </p>

@endsection