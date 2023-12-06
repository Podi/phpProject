async function main() {
  const nameElement = document.getElementById('wine-of-the-day-name');
  const imageElement = document.getElementById('wine-of-the-day-image');
  const countryElement = document.getElementById('wine-of-the-day-country');
  const priceElement = document.getElementById('wine-of-the-day-price');
  const descriptionElement = document.getElementById(
    'wine-of-the-day-description'
  );

  const weekDay = new Date().getDay();

  const res = await fetch(
    `http://localhost/wordpress/wp-json/wine/v1/wine-of-the-day?day=${weekDay}`
  );

  const data = await res.json();

  nameElement.innerText = data.name;
  imageElement.src = data.image;
  imageElement.alt = data.name;
  countryElement.innerText = `Country of origin: ${data.country}`;
  priceElement.innerText = `Price: ${data.price}`;
  descriptionElement.innerText = data.description;
}

main();
