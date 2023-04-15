import './bootstrap';

let pokemons = document.getElementsByClassName("pokemon-img");

var myFunction = function() {
    var height = this.getAttribute("data-height");
    var weight = this.getAttribute("data-weight");
    var baseExperience = this.getAttribute("data-experience");
    var abilities = this.getAttribute("data-abilities");
    var name = this.getAttribute("data-name");
    window.scrollTo(0, 0);
    

    document.getElementById("name").innerHTML = name;

    document.getElementById("baseexperience").innerHTML = "Base experience: " + baseExperience;
    document.getElementById("weight").innerHTML = "Weight: " + weight;
    document.getElementById("height").innerHTML = "Height: " + height;
    document.getElementById("abilities").innerHTML = "Abilities: " + abilities;

};

for (var i = 0; i < pokemons.length; i++) {
    pokemons[i].addEventListener('click', myFunction, false);
}

