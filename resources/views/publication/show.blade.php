
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{asset('styles/main.css')}}">
        <style>
            .super{
                display: flex;
            }
            .main{
                height: 24em;
                overflow: hidden;
                width: 1000px;
                margin-left: 1em;

            }
            .publications{
                padding: 0em 1.5em;

            }
            .foot{
                margin: 0em 2em 0em 0em;
                height: 23em;
                background-color: rgb(53, 53, 65);
                padding-left: 1em;
            }

            .footer{
                clear: both;
            }

            .sub_main{
                margin: 1em .75em 2em 0em;
                padding: 1.75em;
                width: 300px;
                color: rgb(53, 53, 65);
                background-color: rgb(222, 255, 244);
                overflow: auto;
            }

            .ssub_main{
                color: rgb(222, 255, 244);
                background-color: rgb(53, 53, 65);
                margin: 1em 0em;
                padding: .75em;
            }
        </style>
    </head>
    <body>

        @include('header')

        <div class="head">
            <h1 style="display: flex;">
                <a href="{{route('dashboard')}}"><em>The Blogger </em></a> /
                <em><a href="{{route('publication.index')}}"> Publications</a></em>
            </h1>
        </div>

        <div class="super">
            <div class="main">
                @if ( App\Models\Publication::all()->first() )
                <div class="publications">
                    @include('users_publications')
                </div>
                @endif
            </div>


            <div class="foot" id="main_show_pub">

                <div class="sub_head" hidden>
                    {{$publication = App\Models\Publication::find($publication_id)}}
                    {{$user = App\Models\User::find($publication->user_id)}}
                </div>

                <div class="sub_main" id="sub_main1" style="height: 200px;">
                    <div class="ssub_main"><small><em>{{$publication->updated_at}}</em></small></div>
                    <div class="ssub_main" id="pub_message">{{$publication->comment}}</div>
                    <div class="ssub_main"><em>{{$user->first_name}} {{$user->last_name}}</em></div>
                </div>

                <div class="sub_main" id="sub_main2" style="display: flex; padding-right: 3em; height: 8px;">
                    @if (auth()->user()->id == $user->id)
                        <a style="padding-right: 3em;" href="{{route('publication.edit', $publication->id)}}"><button>Edit</button></a>
                        <a href="">
                            <form method="post" action="{{route('publication.destroy', $publication->id)}}">
                                @csrf @method('delete')
                                <button type="submit" value="">Delete</button>
                            </form>
                        </a>
                    @endif
                </div>

            </div>
        </div>
        @include('footer')

    </body>
</html>
