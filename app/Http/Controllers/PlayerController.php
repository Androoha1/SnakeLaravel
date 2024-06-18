<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
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
            'best_score' => 'required|integer',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $player->photo = $photoPath;
        }

        $player->update($request->except('photo'));

        return redirect()->route('players.index')->with('success', 'Profile updated successfully.');
    }
}


