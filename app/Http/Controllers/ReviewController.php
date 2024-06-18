<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);

        if (Auth::id() !== $review->user_id) {
            abort(403);
        }

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        if (Auth::id() !== $review->user_id) {
            abort(403);
        }

        $request->validate([
            'comment' => 'required|string',
        ]);

        $review->update([
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        if (Auth::id() !== $review->user_id) {
            abort(403);
        }

        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }
}
