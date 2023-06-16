const apiUrl = "https://dry-cliffs-94979.herokuapp.com/";

const cardsContainer = document.querySelector("#cards");

let data = [];

async function fetchCards() {
  let response = await fetch(apiUrl);

  const dataResponse = await response.json();

  return dataResponse;
}

function renderCards(cards) {
  cardsContainer.innerHTML = "";
  cards.map(renderCard);
}

function renderCard(card) {
  const div = document.createElement("div");

  div.className = "card__item";

  div.innerHTML = `<img src="${card.photo}"alt="${card.name}"
    class="card__item--image"
    />
  <div class="card__description">
    <div class="card__description--type">${card.property_type}</div>
    <h1 class="card__description--name">${card.name}</h1>
    <h3 class="card__description--price">R$ ${card.price},00</h3>
  </div>
  `;

  cardsContainer.appendChild(div);
}

async function main() {
  data = await fetchCards();

  if (data[0]) {
    renderCards(data);
  }
}

main();

function orderByNameAZ() {
  data.sort(function (a, b) {
    return a.name > b.name ? 1 : b.name > a.name ? -1 : 0;
  });

  renderCards(data);
}

function orderByNameZA() {
  data.sort(function (a, b) {
    return a.name < b.name ? 1 : b.name < a.name ? -1 : 0;
  });

  renderCards(data);
}

function orderByType() {
  data.sort(function (a, b) {
    return a.property_type > b.property_type
      ? 1
      : b.property_type > a.property_type
      ? -1
      : 0;
  });

  renderCards(data);
}

function orderByPriceCrescent() {
  data.sort(function (a, b) {
    return a.price > b.price ? 1 : b.price > a.price ? -1 : 0;
  });

  renderCards(data);
}

function orderByPriceDecreasing() {
  data.sort(function (a, b) {
    return a.price < b.price ? 1 : b.price < a.price ? -1 : 0;
  });

  renderCards(data);
}

function handleSearch() {
  let valueInput = document.querySelector("#searchInput").value.toUpperCase();

  const filteredResults = data.filter((places) => {
    const placesToSearchByName = places.name.toUpperCase();

    if (placesToSearchByName.search(valueInput) > -1) {
      return places;
    }
  });

  renderCards(filteredResults);
}

document.getElementById('openModalBtn').addEventListener('click', function() {
  document.getElementById('modal').style.display = 'block';
});

document.getElementsByClassName('close')[0].addEventListener('click', function() {
  document.getElementById('modal').style.display = 'none';
});

window.addEventListener('click', function(event) {
  if (event.target == document.getElementById('modal')) {
    document.getElementById('modal').style.display = 'none';
  }
});


document.getElementById('openModalBtn').addEventListener('click', function() {
  document.getElementById('modal').style.display = 'block';
});

document.getElementsByClassName('close')[0].addEventListener('click', function() {
  document.getElementById('modal').style.display = 'none';
});

window.addEventListener('click', function(event) {
  if (event.target == document.getElementById('modal')) {
    document.getElementById('modal').style.display = 'none';
  }
});