<?php

namespace App\Console\Commands;

use App\Models\Ability;
use App\Models\Pokemon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SavePokemonsInDataBase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:save-pokemons-in-data-base';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pokemonApiUrl = 'https://pokeapi.co/api/v2/pokemon/';

        for ($i = 1; $i <= 100; $i++) {
            $pokemonId = $i;
       
            $response = Http::get($pokemonApiUrl . $pokemonId);

            $abilities = $response->object()->abilities;

            $name = $response->object()->name;
            $height = $response->object()->height;
            $weight = $response->object()->weight;
            $baseExperience = $response->object()->base_experience;
            $image = $response->object()->sprites->front_default;


            $pokemon = Pokemon::updateOrCreate(['id' => $pokemonId], [
                'id' => $pokemonId,
                'name' => $name,
                'base_experience' => $baseExperience,
                'height' => $height,
                'weight' => $weight,
                'image' => $image
            ]);

            //Delete all the pokemon abilities (If these exist) to keep Pokemon abilities updated.  

            $pokemon->abilities()->detach();

            foreach ($abilities as $key => $ability) {

                $abilityName = $ability->ability->name;

                $abilityModel = Ability::where('name', $abilityName)->first();

                if (is_null($abilityModel)) {
                    $abilityModel = Ability::create([
                        'name' => $abilityName
                    ]);
                }

                $pokemon->abilities()->attach($abilityModel->id);
            }
        }


    }
}
