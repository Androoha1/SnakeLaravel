<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport", content="width=device-width, initial-scale=1.0">
        <title>{{ __('messages.play_snake_game') }}</title>
        <link rel="stylesheet" href="css/snake.css">
        <script src="js/main.js"></script>
        <script src="js/SnakeClass.js"></script>
        <script src="js/AppleClass.js"></script>

        <style>
            .panel {
            }
        </style>
    </head>

    <body>

        <p id="score" style="color: darkgreen;" class="score">0</p>
        
        <canvas id="board" style="border: 2px solid white;"></canvas>

        <div class="panel">
            <a href="/"><button>{{ __('messages.back_to_lobby') }}</button></a>
            <a href="{{ route('players.index') }}"><button>{{ __('messages.list_of_players') }}</button></a>
        </div>

    </body>
</html>
