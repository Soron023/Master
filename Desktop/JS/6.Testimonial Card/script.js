const people = [
  {
    name: "Heng Menghoy",
    position: "IT supporter",
    imgSource: "Img/person1.webp",
    text: " soluta aperiam cumque esse debitisamet  quae obcaecati dignissimos aliquid fugit? Ducimus delectus quaerat distinctio possimus similique, laborum recusandae odit dicta temporibus,",
  },
  {
    name: "Chum Seyha",
    position: "Cashier",
    imgSource: "Img/person2.webp",
    text: " quae obcaecati dignissimos soluta aperiam cumque esse debitisamet aliquid fugit? Ducimus delectus quaerat distinctio possimus similique, laborum recusandae odit dicta temporibus,",
  },
  {
    name: "Hak Naro",
    position: "camera-man",
    imgSource: "Img/person3.webp",
    text: "debitisamet aliquid fugit? Ducimus lkjkljk quae obcaecati dignissimos  fugit? Ducimus delectus quaerat distinctio possimus similique, laborum recusandae odit dicta temporibus,",
  },
  {
    name: "Chorn Socheata",
    position: "Teacher and bussiness woman",
    imgSource: "Img/person4.webp",
    text: "apple  quae  cumque esse debitisam obcaecati dignissimos soluta delectus quaerat distinctio possimus similique, laborum recusandae odit dicta temporibus,",
  },
];

const img = document.querySelector(".img > img");
const author = document.querySelector(".name");
const position = document.querySelector(".position");
const text = document.querySelector(".thought");
const nextBtn = document.querySelector(".next-btn");
const prevBtn = document.querySelector(".prev-btn");

let counter = 0;

window.addEventListener("DOMContentLoaded", function () {
  const randomeNumber = Math.floor(Math.random() * people.length);
  showingPerson(randomeNumber);
});

function showingPerson(p) {
  const person = people[p];
  img.src = person.imgSource;
  author.textContent = person.name;
  position.textContent = person.position;
  text.textContent = person.text;
}

nextBtn.onclick = function () {
  if (counter == people.length - 1) {
    counter = 0;
  } else {
    counter++;
  }
  showingPerson(counter);
};

prevBtn.onclick = function () {
  if (counter == 0) {
    counter = people.length - 1;
  } else {
    counter--;
  }
  showingPerson(counter);
};
