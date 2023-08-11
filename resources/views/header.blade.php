<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="resources/css/app.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        @auth
        <a class="header_nav_links" href="{{ route('user.show', auth()->user()->id) }}">Profile : {{strtoupper(auth()->user()->first_name)}} {{strtoupper(auth()->user()->last_name)}}</a>
        <a class="header_nav_links" href="{{ route('dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        <a class="header_nav_links" href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
        @else
        <a class="header_nav_links" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        <a class="header_nav_links" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endauth
    </div>
</body>
</html>
