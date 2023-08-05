const container = document.querySelector(".pokemon-container");
const spinner = document.querySelector("#spinner");
const previous = document.querySelector("#previous");
const next = document.querySelector("#next");

let limit = 8;
let offset = 1;

previous.addEventListener("click", () => {
    if (offset != 1) {
        offset -= 9;
        removeChildNodes(container);
        fetchPokemons(offset, limit);
    }
});

next.addEventListener("click", () => {
    offset += 9;
    removeChildNodes(container);
    fetchPokemons(offset, limit);
});

function fetchPokemon(id) {
    fetch(`https://pokeapi.co/api/v2/pokemon/${id}/`)
        .then((res) => res.json())
        .then((data) => {
            getPokemon(data);
            spinner.style.display = "none";
        });
}

function fetchPokemons(offset, limit) {
    spinner.style.display = "block";
    for (let i = offset; i <= offset + limit; i++) {
        fetchPokemon(i);
    }
}

function getPokemon(data) {
    const item = document.createElement("a");
    item.classList.add("container-item", data.types[0].type.name);
    item.style.order = data.id;
    item.setAttribute("id", data.id);
    item.setAttribute("href", `/ver_datos_pokemon/${data.id}`);
    item.innerHTML = data.name;
    container.appendChild(item);
}

function removeChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}
fetchPokemons(offset, limit);

function ocultarMensajeInicioSesion() {
    var mensajeInicioSesion = document.querySelector(".mensaje_inicio_session");
    if (mensajeInicioSesion) {
        mensajeInicioSesion.style.display = "none";
    }
}

window.onload = function () {
    setTimeout(ocultarMensajeInicioSesion, 5000);
};
