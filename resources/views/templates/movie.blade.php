<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="default-template movie-index">
        <main>
            <div class="container py-4">
                @include('partials.header-bar')
                @yield('main-content')
                @include('partials.footer')
            </div>
        </main>
        @include('partials.scripts')
    </body>
</html>
