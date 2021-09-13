<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Starter</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body id="@yield('body')">

<nav class="navbar">
    <ul class="nav-menu">
        @if(app()->getLocale() == 'fr')
            <li><a href="{{ url('/en' . substr(request()->getRequestUri(), 3)) }}">EN</a></li>
        @else
            <li><a href="{{ url('/fr' . substr(request()->getRequestUri(), 3)) }}">FR</a></li>
        @endif
        @auth
            <li><a href="{{ url(app()->getLocale() . '/') }}">Home</a></li>
            <li>
                <form action="{{ url(app()->getLocale() . '/logout') }}" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @else
            <li><a href="{{ url(app()->getLocale() . '/login') }}">Login</a></li>
        @endauth
    </ul>
</nav>

@yield('content')

</body>
</html>
