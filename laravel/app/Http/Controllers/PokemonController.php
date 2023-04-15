<?php

namespace App\Http\Controllers;

use App\Http\Responses\ResponsePokemon;
use App\Models\Ability;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PokemonController extends Controller
{
    public function index($page)
    {
        $final = $page * 10;
        $start = ($final - 10) + 1;

        $pokemonApiUrl = 'https://pokeapi.co/api/v2/pokemon/';

        $pokemonList = [];
        for ($i = $start; $i <= $final; $i++) {
            $pokemonId = $i;
            $pokemon = new ResponsePokemon();
            try {
                $response = Http::timeout(3)->get($pokemonApiUrl . $pokemonId);

                if (!$response->ok()) {
                    $abilities = $response->object()->abilities;
                    $name = $response->object()->name;
                    $height = $response->object()->height;
                    $weight = $response->object()->weight;
                    $baseExperience = $response->object()->base_experience;
                    $image = $response->object()->sprites->front_default;

                    $pokemon->name = $name;
                    $pokemon->height = $height;
                    $pokemon->weight = $weight;
                    $pokemon->baseExperience = $baseExperience;
                    $pokemon->image = $image;
                    $abilitiesList = [];

                    foreach ($abilities as $key => $ability) {
                        $pokemonAbility = $ability->ability->name;
                        $abilitiesList[$key] = $pokemonAbility;
                    }
                    $abilitiesList = implode(",", $abilitiesList);
                    $pokemon->abilities = $abilitiesList;
                } else {
                    $pokemon = $this->getPokemonFromDataBase($pokemonId);
                }
            } catch (\Throwable $th) {
                $pokemon = $this->getPokemonFromDataBase($pokemonId);
            }
            array_push($pokemonList,$pokemon);
        }

      
        //return response()->json($pokemonList, 200);
        return view('pokemon.index',[
            'pokemons' => $pokemonList,
     
        ]);
    }

    public function home(){
        return redirect()->route('pokemon.index',1);
    }

    public function getPokemonFromDataBase($pokemonId)
    {
        $pokemon = new ResponsePokemon();
        $pokemonModel = Pokemon::find($pokemonId);
        $pokemon->name = $pokemonModel->name;
        $pokemon->height = $pokemonModel->height;
        $pokemon->weight = $pokemonModel->weight;
        $pokemon->baseExperience = $pokemonModel->base_experience;
        $pokemon->image = $pokemonModel->image;

        $abilitiesList = [];

        $abilities = $pokemonModel->abilities()->get();

        foreach ($abilities as $key => $ability) {
            $pokemonAbility = $ability->name;
            $abilitiesList[$key] = $pokemonAbility;
        }
        $abilitiesList = implode(",", $abilitiesList);
        $pokemon->abilities = $abilitiesList;
        

        return $pokemon;
    }
}
