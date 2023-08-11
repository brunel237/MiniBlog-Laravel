<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles/main.css')}}">
    <title>Blog Users</title>
    <style>
        .user_links{
            margin: 0em 0em 1em .75em;
        }
    </style>
</head>
<body>
    @include('header')

    <div class="head">
        <h1 style="display: flex;">
            <a href="{{route('dashboard')}}"><em>The Blogger </em></a> /
            <em><a href="{{route('user.index')}}"> Users</a></em>
        </h1>
    </div>

    <div class="main">
        @foreach (App\Models\User::all() as $user)
            <a class="user_links" href="{{route('user.show', $user->id)}}">{{$user->first_name}} {{$user->last_name}}</a>
        @endforeach
    </div>

    @include('footer')
</body>
</html>
