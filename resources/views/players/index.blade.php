@extends('layouts.app')

@section('content')

    <h1>{{ __('messages.list_of_players') }}</h1>
    <table>
        <thead>
            <tr>
                <th>{{ __('messages.name') }}</th>
                <th>{{ __('messages.phone') }}</th>
                <th>{{ __('messages.email') }}</th>
                <th>{{ __('messages.best_score') }}</th> <!-- New column header for best score -->
                <th>{{ __('messages.photo') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
                <tr>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->phone }}</td>
                    <td>{{ $player->email }}</td>
                    <td>{{ $player->best_score }}</td> <!-- Display best score for each player -->
                    <td>
                        @if($player->photo)
                            <img src="{{ asset('storage/' . $player->photo) }}" alt="Player Photo" style="width: 150px;">
                        @else
                            {{ __('messages.no_photo') }}
                        @endif
                    </td>
                    <td>
                        @if(Auth::id() === $player->id)
                            <a href="{{ route('players.edit', $player->id) }}" style="margin-left: 20px;">{{ __('messages.edit') }}</a>

                            <!-- Add a delete form after the edit link -->
                            <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('{{ __('messages.confirm_delete') }}')" style="margin-left: 20px;">{{ __('messages.delete') }}</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('lobby') }}"><button>{{ __('messages.back_to_lobby') }}</button></a>
@endsection
