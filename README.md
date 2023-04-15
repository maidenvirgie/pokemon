
Steps.

# 1. This repository must be cloned. 


# 2 Execute the following command (Important: 8089 port must be available).
 docker-compose up

# 3 Wait a moment whilst the server is ready, and then execute the following command.
docker-compose exec backendpokemon php artisan migrate

# 4 Execute the following command:
docker-compose exec backendpokemon php artisan app:save-pokemons-in-data-base

# 5 Open in the navigator the following url: 
http://localhost:8089/pokemon/

