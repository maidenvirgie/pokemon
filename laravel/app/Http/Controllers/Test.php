<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Test extends Controller
{
    public function show()
    {
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/2');

        dd($response->object());

        return $response->object();
    }
}
