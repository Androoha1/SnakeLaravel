<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('listings' , [
        'heading' => 'Latest listings',
        'listings' => Listing::all()
    ]);
});

Route::get('/listing/{id}', function($id) {
    return view('layout' , [
        'heading' => 'Enjoy your reading today!',
        'listing' => Listing::find($id)
    ]);
});
