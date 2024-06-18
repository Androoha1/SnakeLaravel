<!-- resources/views/reviews/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.create_review') }}</h1>

    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <div>
            <label for="comment">{{ __('messages.comment') }}:</label>
            <textarea name="comment" id="comment" required></textarea>
        </div>
        <button type="submit">{{ __('messages.submit') }}</button>
    </form>
@endsection
