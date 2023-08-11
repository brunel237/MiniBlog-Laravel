<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles/main.css')}}">
    <title>Edit Password</title>
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
        <form action="{{route('pass_update')}}" method="post">
            @csrf
            <div class="user_info">
                <label for="pwd"> Present Password :</label>
                <input type="password" name="pwd">
            </div>
            <div class="user_info">
                <label for="password"> New Password :</label>
                <input type="password" name="password">
            </div>
            <div class="user_info">
                <label for="password_confirmation"> Confirm Password :</label>
                <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
            </div>
            {{-- @error('password_confirmation')
                <span class="alert-danger">{{$message}}</span>
            @enderror --}}
            <div class="user_info"><input type="submit" value="Edit"></div>
        </form>
    </div>
    @include('footer')
</body>
<script src="">

</script>
</html>


