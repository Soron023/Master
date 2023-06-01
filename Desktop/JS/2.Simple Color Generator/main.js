const colors = ["red", "green", "blue", "pink", "#a41c96", "rgb(214, 182, 23)"];

const button = document.querySelector(".btn");

const getRandomNumer = () => Math.floor(Math.random() * colors.length);

button.addEventListener("click", function () {
  const randomIndex = getRandomNumer();
  document.body.style.background = colors[randomIndex];

  console.log(randomIndex);
});
