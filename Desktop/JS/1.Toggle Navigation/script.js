const toggle = document.querySelector(".toggle");
const navLists = document.querySelector(".nav-lists");

toggle.addEventListener("click", function () {
  navLists.classList.toggle("active");
});

// ឬសរសេរបែបនេះវិញក៏បាន ដោយប្រើនូវ Condition
// toggle.addEventListener("click", function () {
//   if (navLists.classList.contains("active")) {
//     navLists.classList.remove("active");
//   } else {
//     navLists.classList.add("active");
//   }
// });
