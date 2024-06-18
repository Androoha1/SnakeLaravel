<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport", content="width=device-width, initial-scale=1.0">
        <title>{{ __('messages.play_snake_game') }}</title>
        <link rel="stylesheet" href="snake.css">
        <script src="main.js"></script>
        <script src="SnakeClass.js"></script>
        <script src="apple.js"></script>
    </head>

    <body>

        <div class="header">
            <p id="score1" class="score">0</p>
            <h1 id="name">WebSnake</h1>
            <p id="score2" class="score">0</p>
        </div>
        
        <canvas id="board"></canvas>


        <a href="{{ route('lobby') }}"><button>{{ __('messages.back_to_lobby') }}</button></a>
        <a href="{{ route('players.index') }}"><button>{{ __('messages.list_of_players') }}</button></a>

    </body>
</html>
