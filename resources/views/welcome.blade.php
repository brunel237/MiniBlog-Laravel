
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="{{asset('styles/main.css')}}">
    </head>
    <body>

        @include('header')

        <div class="head">
            <h1>The Blogger</h1>
        </div>

        <div class="main">
            @auth
                @if ( App\Models\Publication::all()->first())
                <div>
                    @include('users_publications')
                </div>
                @endif
            @endauth
        </div>

        <div style="color: #2d3748">
            {{-- <div><a href="{{ route('publication.create') }}">Nouvelle Publication</a></div> --}}
        </div>

        @include('footer')

    </body>
</html>
