<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles/main.css')}}">
    <title>Registration</title>
</head>
<body>
    @include('header')

    <div class="head">
        <h1 style="display: flex;">
            <a href="{{route('welcome')}}"><em>The Blogger </em></a> /
            <em><a href="{{route('register')}}"> Registration</a></em>
        </h1>
    </div>

    <div class="main">
        <form class="regisForm" action="{{route('authRegister')}}" method="POST">
            @csrf
          <div class="col-md-4">
            <label for="first_name" class="form-label">First Name : </label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
          </div>
          <div class="col-md-4">
            <label for="last_name" class="form-label">Last name : </label>
            <input style="margin-left: 2.1em" type="text" class="form-control" id="last_name" name="last_name" required>
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Email : </label>
            <input style="margin-left: 5em"  type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="col-md-3">
            <label for="password" class="form-label">Password : </label>
            <input style="margin-left: 2.8em" type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="user_info">
            <label for="password_confirmation"> Confirm Password :</label>
            <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
            </div>
            {{-- @error('password_confirmation')
                <span class="alert-danger">{{$message}}</span>
            @enderror --}}
            <input style="margin-left: 5em; width: 20em; height: 3em;" class="btn btn-primary" type="submit" value="Register">
        </form>
    </div>

    @include('footer')
</body>
</html>
