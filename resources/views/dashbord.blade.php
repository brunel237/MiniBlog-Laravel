<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Blogger</title>
        <link rel="stylesheet" href="{{asset('styles/main.css')}}">
    </head>
    <body>

        @include('header')

        <div class="head">
            <h1 style="display: flex;">
                <a href="{{route('dashboard')}}"><em>The Blogger</em></a> /
            </h1>
        </div>

        <div class="main">
            @if ( App\Models\Publication::all()->first() )
            <div class="publications">
                @include('users_publications')
            </div>
            @endif
        </div>

        @include('footer')

    </body>
</html>
