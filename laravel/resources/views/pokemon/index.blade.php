@extends('layout')


@section('content')
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-2 justify-center">
            <div class="mx-auto mt-5 mb-4 flex flex-col order-1">

                @forelse ($pokemons as $pokemon)
                    <ul class="max-w-xs flex flex-col">
                        <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium bg-white border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                            <p class="poke-list-name">{{ $pokemon->name }}</p>
                            <img class="pokemon-img cursor-pointer" src="{{ $pokemon->image }}" alt="" data-name="{{ $pokemon->name }}"
                            data-height="{{ $pokemon->height }}" data-weight="{{ $pokemon->weight }}"
                            data-experience="{{ $pokemon->baseExperience }}" data-abilities="{{ $pokemon->abilities }}">
                        </li>
                      
                    </ul>


                @empty
                @endforelse


            </div>
            <div class="sm:order-1 mx-auto mt-5 mb-4 flex flex-col">


                <div
                    class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white" id="name">
                        Name
                    </h3>

                    <p class="mt-2 text-gray-800 dark:text-gray-400" id="height">Height: </p>
                    <p class="mt-2 text-gray-800 dark:text-gray-400" id="weight">Weight: </p>
                    <p class="mt-2 text-gray-800 dark:text-gray-400" id="baseexperience">Base Experience:</p>
                    <p class="mt-2 text-gray-800 dark:text-gray-400" id="abilities">Abilities:</p>
                </div>

            </div>


        </div>
        <div>

        <nav class="flex justify-center items-center space-x-2">
            @for ($i = 1; $i <= 10; $i++)
         
                <a class="w-10 h-10 text-gray-500 hover:text-blue-600 p-4 inline-flex items-center text-sm font-medium rounded-full"
                    href="{{ route('pokemon.index', $i) }}" aria-current="page">{{ $i }}</a>
            @endfor
         
        </nav>

        </div>
    </div>
@endsection
