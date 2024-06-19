<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{


    public function updateScore(Request $request)
    {
        $userId = Auth::id();
        $score = $request->input('score');

        $user = User::findOrFail($userId);
        $user->best_score = $score;
        $user->save();

        return response()->json(['message' => 'Score updated successfully.']);
    }

    public function updateBestScore(Request $request)
    {
        $userId = $request->input('userId');
        $score = $request->input('score');

        $user = User::findOrFail($userId);
        if ($score > $user->best_score) {
            $user->best_score = $score;
            $user->save();
        }

        return response()->json(['message' => 'Best score updated successfully.']);
    }

    public function index()
    {
        $players = User::all();
        return view('players.index', compact('players'));
    }

    public function edit($id)
    {
        $player = User::findOrFail($id);

        if (Auth::id() !== $player->id) {
            abort(403);
        }

        return view('players.edit', compact('player'));
    }

    public function destroy($id)
    {
        $player = User::findOrFail($id);

        if (Auth::id() !== $player->id) {
            abort(403);
        }

        $player->delete();

        return redirect()->route('lobby')->with('success', 'Player deleted successfully.');
    }

      public function update(Request $request, $id)
    {
        $player = User::findOrFail($id);

        if (Auth::id() !== $player->id) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Если фотография передана, сохраняем её
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $player->photo = $photoPath;
        }

        // Обновляем остальные поля
        $player->name = $request->input('name');
        $player->phone = $request->input('phone');
        $player->email = $request->input('email');

        $player->save();

        return redirect()->route('players.index')->with('success', 'Profile updated successfully.');
    }
}


