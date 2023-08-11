<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles/main.css')}}">
    <title>{{$user->first_name}} {{$user->last_name}}</title>
</head>

<style>
    .main{
        background-color: rgb(53, 53, 65);
        padding: 1em 0em 1em 2.5em;
        width: 50%;
        margin: 1em;
        color: rgb(222, 255, 244);
    }
    .foot{
        display: flex;
    }
    .user_info{
        margin: 1em 0.5em;

    }
    .sub_foot{
        margin-left: 3em;
    }
</style>

<body>
    @include('header')
    <div class="head">
        <h1 style="display: flex;">
            <a href="{{route('dashboard')}}"><em>The Blogger </em></a> /
            <em><a href="{{route('user.index')}}"> Users</a></em> /
            <em><a href="{{route('user.show', $user->id)}}"> Profile</a></em>
        </h1>
    </div>
    <div class="main">
        <div class="user_info">First Name : {{strtoupper($user->first_name)}}</div>
        <div class="user_info">Last Name : {{strtoupper($user->last_name)}}</div>
        <div class="user_info">Email : {{$user->email}}</div>
        <div class="user_info">Role : @if ($user->role) Administrator @else User @endif </div>
        <div class="user_info">Registered Date : {{$user->created_at}}</div>
    </div>
    <div class="foot">
        @auth
            @if (auth()->user()->id == $user->id)
            <a class="sub_foot" href="{{route('user.edit', $user->id)}}">Edit Profile</a>
            <a class="sub_foot" href="{{route('pass_edit', $user->id)}}">Edit Password</a>
            <a class="sub_foot" href="{{route('user.destroy', $user->id)}}">Delete Account</a>
            @else
            <a class="sub_foot" href="">Message {{$user->first_name}}</a>
            <a class="sub_foot" href="">Report {{$user->first_name}}</a>
            @endif
        @endauth
    </div>
    @include('footer')
</body>
</html>
