const inputBox = document.querySelector(".input-wrapper > input");
const addBtn = document.querySelector(".input-wrapper > button");
const listContainer = document.querySelector(".list-container");

addBtn.onclick = function () {
  if (inputBox.value == "") {
    return null;
  } else {
    let li = document.createElement("li");
    let span = document.createElement("span");
    li.innerHTML = inputBox.value;
    span.innerText = "-";
    li.appendChild(span);
    listContainer.appendChild(li);
    inputBox.value = "";
  }
};

listContainer.addEventListener("click", function (e) {
  if (e.target.tagName == "SPAN") {
    e.target.parentElement.remove();
  }
});
