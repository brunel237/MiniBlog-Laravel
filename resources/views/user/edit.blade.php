<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles/main.css')}}">
    <title>Edit {{auth()->user()->first_name}} {{auth()->user()->last_name}}</title>
</head>

<body>
    @include('header')
    <div class="head">
        <h1 style="display: flex;">
            <a href="{{route('dashboard')}}"><em>The Blogger </em></a> /
            <em><a href="{{route('user.index')}}"> Users</a></em> /
            <em><a href="{{route('user.show', auth()->user()->id)}}"> Profile</a></em> /
            <em><a href="{{route('user.edit', auth()->user()->id)}}"> Edit</a></em>
        </h1>
    </div>
    <div class="main">
        <form action="{{route('user.update', auth()->user()->id)}}" method="post">
            @csrf @method('put')
            <div class="user_info">First Name : <input type="text" name="first_name"></div>
            <div class="user_info">Last Name : <input type="text" name="last_name"></div>
            <div class="user_info">Email : <input type="email" name="email"></div>
            <div class="user_info"><input type="submit" value="Edit"></div>
        </form>
    </div>
    <div class="foot">
        @auth
            <a href="{{route('pass_edit', auth()->user()->id)}}">Edit Password</a>
            <a href="{{route('user.destroy', auth()->user()->id)}}">Delete Account</a>
        @endauth
    </div>
    @include('footer')
</body>
</html>


