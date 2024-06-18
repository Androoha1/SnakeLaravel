<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player; // Update this to match your Player model if different

class LobbyController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function showPlayers()
    {
     
    }

    public function showPlay()
    {
        return view('play');
    }

    public function logout()
    {
        // Handle logout logic if needed
    }
}
