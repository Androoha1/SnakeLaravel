<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.lobby') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevent scrolling */
            width: 100%;
            height: 100%;
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start; /* Align items to the top */
            background-color: black;
            color: white;
            font-family: 'Press start 2P', cursive;
        }
        * {
            box-sizing: inherit; /* Ensure all elements use the same box-sizing */
        }
        .header {
            width: 100%;
            height: 70px; /* Thinner header height */
            padding: 5px 20px; /* Reduced padding */
            display: flex;
            justify-content: flex-start; /* Align items to the right */
            align-items: center;
            border-bottom: 1px solid rgb(0, 37, 0);
            background-color: black;
        }
        .header button {
            padding: 5px 15px;
            font-size: 25px;
            cursor: pointer;
            background-color: rgb(0, 37, 0);; /* White background */
            color: white; /* Black text color for contrast */
            border: none; /* Remove default border */
            border-radius: 10px; /* Rounded corners */
            text-decoration: none; /* Remove underline for button */
            margin-right: 10px; /* Add margin to prevent it from touching the right edge */
        }
        .header button:hover {
            background-color: #f0f0f0; /* Slightly lighter background on hover */
        }
        .game_name {
            font-size: 70px; /* Keep the font size to 48px for better fit */
            margin: 0; /* Remove margin */
            margin-top: 20px; /* Add margin to push it away from the header */
        }
        .play-button {
            margin-top: 250px; /* Add margin to push the button down */
            padding: 50px 100px; /* Increase padding for larger size */
            font-size: 32px; /* Increase font size */
            color: white;
            background-color: rgb(0, 37, 0);
            border: none;
            cursor: pointer;
            border-radius: 20px; /* Larger border radius for more rounded corners */
            border: 2px solid white;
            text-decoration: none;
        }
        .play-button:hover {
            background-color: darkgreen;
        }
        .footer {
            width: 100%;
            padding: 10px 0; /* Padding for the footer */
            background-color: #333; /* Dark background color */
            color: black; /* White text color */
            background-color: rgb(0, 37, 0);
            position: fixed; /* Fixed position at the bottom */
            bottom: 0; /* Stick to the bottom */
            display: flex; /* Use flexbox for layout */
            justify-content: center; /* Center items horizontally */
        }
        .footer p {
            font-size: 18px;
            margin: 0 10px; /* Add margin around each item */
            border-right: 3px solid white; /* Vertical line between paragraphs */
            padding: 0 10px; /* Padding to separate text from line */
        }
        .footer p:last-child {
            border-right: none; /* Remove border from the last paragraph */
            padding-right: 0; /* Remove padding on the right side of the last paragraph */
        }
    </style>
</head>
<body>

    <div class="header">
        <div>
            <!-- Login button, assuming the route name for login is 'login' -->
            <a href="/login"><button>{{ __('messages.login') }}</button></a>
            <a href="{{ route('register') }}"><button>{{ __('messages.register') }}</button></a>
            <a href="{{ route('players.index') }}"><button>{{ __('messages.list_of_players') }}</button></a>
            <a href="{{ route('reviews.index') }}"><button>{{ __('messages.reviews_about_game') }}</button></a>
        </div>

        <div>
            <a href="{{ url()->current() }}?lang=en">Eng</a>
            <a href="{{ url()->current() }}?lang=lv">Lv</a>
        </div>
    </div>

    <h1 class="game_name">Snake Web</h1>
    <!-- Play button, linking to the 'play' route -->
    <a href="{{ route('play') }}" class="play-button">{{ __('messages.play') }}</a>
</body>
</html>
