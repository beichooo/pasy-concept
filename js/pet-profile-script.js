console.log("hello pet profile");

const wantVisit = document.querySelector(".results__cta");
const logoNavbar = document.getElementsByClassName("nav-bar__logo");
const donateToPetBtn = document.querySelector("#donateToPet");
const donateToShelterBtn = document.querySelector("#donateToShelter");

logoNavbar[0].addEventListener("click", () => {
  window.location.href = "../index.html";
});

wantVisit.addEventListener("click", () => {
  window.location.href = "../pet-searcher/visit-date.html";
});

donateToPetBtn.addEventListener("click", () => alert("in progress"));

donateToShelterBtn.addEventListener("click", () => alert("in progress"));
