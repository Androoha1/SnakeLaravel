<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lobby</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
<div>
        <a href="{{ url()->current() }}?lang=en">English</a> | <a href="{{ url()->current() }}?lang=lv">Latviski</a>
    </div>
    <h1>{{ __('messages.lobby_snake') }}</h1>
    <ul>
        <li><a href="{{ route('play') }}">{{ __('messages.play') }}</a></li>
        <li><a href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
        <li><a href="{{ route('register') }}">{{ __('messages.register') }}</a></li>
        <li><a href="{{ route('players.index') }}">{{ __('messages.list_of_players') }}</a></li>
        <li><a href="{{ route('reviews.index') }}">{{ __('messages.reviews_about_game') }}</a></li>
        <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('messages.logout') }}
            </a>
        </li>
    </ul>

    
</body>
</html>
