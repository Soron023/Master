const count = document.querySelector(".number");
const btns = document.querySelectorAll(".btn");

let number = 0;

btns.forEach(function (btn) {
  btn.addEventListener("click", function (e) {
    const checkBtn = e.currentTarget.classList;
    if (checkBtn.contains("increase")) {
      number++;
    } else if (checkBtn.contains("decrease")) {
      number--;
    } else {
      number = 0;
    }
    count.innerText = number;
  });
});
