<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles/main.css')}}">
    <title>Login</title>
</head>
<body>
    @include('header')

    <div class="head">
        <h1 style="display: flex;">
            <a href="{{route('welcome')}}"><em>The Blogger </em></a> /
            <em><a href="{{route('login')}}"> Login</a></em>
        </h1>
    </div>

    <div class="main">
        <form action="{{route('authLogin')}}" method="post" class="loginForm">
            @csrf
            <div>
                <label for="email">Email : </label>
                <input style="margin-left: 4em" type="text" name="email" id="email" value="{{old('email')}}">
            </div>
            {{-- @error('email')
                <div class="alert alert-danger" role="alert">
                    <strong>{{$message}}</strong>
                </div>{{-- @if ($errors->has('password')) --}}
            {{--@enderror --}}
                <div class="alert alert-danger" role="alert">
                    {{-- <strong>{{$errors->first('password')}}</strong> --}}
                </div>
                {{-- @endif --}}
            <div>
                <label for="password">Password : </label>
                <input type="password" name="password" id="pwd">
                {{-- @if ($errors->has('password')) --}}
                <div class="alert alert-danger" role="alert">
                    {{-- <strong>{{$errors->first('password')}}</strong> --}}
                </div>
                {{-- @endif --}}
            </div>
            <div>
                <input style="width: 30%; height: 3em; margin-left: 10em;" type="submit" value="Login">
            </div>
        </form>
    </div>

    @include('footer')

</body>
</html>
