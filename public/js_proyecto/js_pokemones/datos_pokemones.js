
const pokemonElement = document.querySelector('.pokemon');
    
const pokemonCart = document.querySelector('.container_cart');

const getPokemon = async () => {
    try {
        const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${pokemonElement.textContent}`);
        const data = await response.json();
        setPokemon(data);
    } catch (error) {
        console.log(error);
    }
};

getPokemon();

const setPokemon = (data) => {
    pokemonCart.querySelector('.name').innerHTML = data.name;

    const imgElement = pokemonCart.querySelector('.img');
    imgElement.setAttribute('src', data.sprites.front_default);
    imgElement.setAttribute('alt', data.name);

    const abilitiesElement = pokemonCart.querySelector('.abilities');
    abilitiesElement.innerHTML = data.abilities.map(ability => ability.ability.name).join(' - ');
};