<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function show(){
        $apikey = '5e761505';
        $imdbId = 'tt34548722';
        $url = "https://www.omdbapi.com/?i={$imdbId}&apikey={$apikey}";

        $response = Http::timeout(10)->get($url);

        if (! $response->successful()) {
            return back()->with('error', 'Gagal mengambil data film dari OMDb API.');
        }

        $movie = $response->json();

        return view('welcome', compact('movie'));
    }
}
