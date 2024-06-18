<!-- resources/views/reviews/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.edit_review') }}</h1>

    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="comment">{{ __('messages.comment') }}:</label>
            <textarea name="comment" id="comment" required>{{ $review->comment }}</textarea>
        </div>
        <button type="submit">{{ __('messages.update') }}</button>
    </form>
@endsection
