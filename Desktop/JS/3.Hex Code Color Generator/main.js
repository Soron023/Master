const hexCode = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f"];
const btn = document.querySelector(".btn");
const hexColorShow = document.querySelector(".hex-color");

const getRandomNumber = () => Math.floor(Math.random() * hexCode.length);

function changeColor() {
  let hexColor = "#";
  for (let i = 1; i <= 6; i++) {
    hexColor += hexCode[getRandomNumber()];
  }
  document.body.style.background = hexColor;
  hexColorShow.innerText = hexColor;
}

btn.addEventListener("click", changeColor);
