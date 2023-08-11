<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('styles/main.css')}}">
    <title>New Publication</title>
    <style>
        .sf{
            margin-bottom: 1.5em
        }
        textarea{
            border-radius: 1em;
            padding: 1em;
            font-size: 1em;
        }
        input{
            margin: 2em 0em 0em 14em;
            width: 8em;
            padding: .3em 1em;
        }
    </style>
</head>
<body>
    @include('header')
    <div class="head">
        <h1 style="display: flex;">
            <a href="{{route('dashboard')}}"><em>The Blogger </em></a> /
            <em><a href="{{route('publication.create')}}"> New Publication</a></em>
        </h1>
    </div>
    <div class="main">
        <form class="pubForm" action="{{route('publication.store')}}" method="post">
            @csrf
            <div class="sf" for="comment">Enter Your Comment :</div>
            <textarea class="sf" name="comment" id="" cols="40" rows="10"></textarea>
            <div class="sf" ><input type="submit" value="Send"></div>
        </form>
    </div>
    @include('footer')
</body>
</html>
