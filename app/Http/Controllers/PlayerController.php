<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    // List all players
    public function index()
    {
        $players = User::all();
        return view('players.index', compact('players'));
    }

    // Show form to edit player information
    public function edit($id)
    {
        $player = User::findOrFail($id);

        // Ensure the logged-in user can only edit their own profile
        if (Auth::id() !== $player->id) {
            abort(403);
        }

        return view('players.edit', compact('player'));
    }



    public function destroy($id)
    {
        $player = User::findOrFail($id);

        // Ensure the logged-in user can only delete their own profile
        if (Auth::id() !== $player->id) {
            abort(403);
        }

        $player->delete();

        return redirect()->route('players.index')->with('success', 'Player deleted successfully.');
    }

    // Update player information
    public function update(Request $request, $id)
    {
        $player = User::findOrFail($id);

        // Ensure the logged-in user can only update their own profile
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




