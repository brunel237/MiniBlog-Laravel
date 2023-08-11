<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>

        /* .each_publication{
            border: 1px solid #fff;
        } */
    </style>
</head>
<body>
    <h4 style="color: rgb(222, 255, 244);">Latest Updates :</h4>
    <div class="updates">
        @foreach ( App\Models\Publication::orderBy('updated_at', 'desc')->get() as $publication )
            <div hidden>{{$user = App\Models\User::find($publication->user_id)}}</div>
            <a class="users_publications" style="padding: 1em; margin:.25em 0em" href="{{route('publication.show', $publication->id)}}">
                <h4>{{$user->first_name}} {{$user->last_name}}</h4>
                <div><em>{{$user->email}}</em></div>
                <div>
                    <small><em>last publication : {{$publication->updated_at}}</em></small>
                </div>
            </a>
        @endforeach
    </div>
</body>
</html>



