<!-- resources/views/reviews/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.reviews') }}</h1>

    <a href="{{ route('reviews.create') }}">{{ __('messages.create_review') }}</a>

    <table>
        <thead>
            <tr>
                <th>{{ __('messages.user') }}</th>
                <th>{{ __('messages.comment') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>
                        @if(Auth::id() === $review->user_id)
                            <a href="{{ route('reviews.edit', $review->id) }}">{{ __('messages.edit') }}</a>
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('{{ __('messages.confirm_delete') }}')">{{ __('messages.delete') }}</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
