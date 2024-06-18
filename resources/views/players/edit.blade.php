@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.edit_profile') }}</h1>
    <form action="{{ route('players.update', $player->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="name">{{ __('messages.name') }}</label>
            <input type="text" name="name" value="{{ $player->name }}" required>
        </div>
        <div>
            <label for="phone">{{ __('messages.phone') }}</label>
            <input type="text" name="phone" value="{{ $player->phone }}" required>
        </div>
        <div>
            <label for="email">{{ __('messages.email') }}</label>
            <input type="email" name="email" value="{{ $player->email }}" required>
        </div>
        <div>
            <label for="best_score">{{ __('messages.best_score') }}</label>
            <input type="number" name="best_score" value="{{ $player->best_score }}" required>
        </div>
        <div>
            <label for="photo">{{ __('messages.photo') }}</label>
            <input type="file" name="photo" accept="image/*">
        </div>
        <button type="submit">{{ __('messages.update') }}</button>
    </form>
@endsection
