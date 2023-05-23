console.log("hello results list");

const logoNavbar = document.getElementsByClassName("nav-bar__logo");
const searchAgainBtn = document.querySelector(".results__cta--secondary");
const seeMoreBtn = document.getElementsByClassName("seeMorePet");

logoNavbar[0].addEventListener("click", () => {
  window.location.href = "../index.html";
});

searchAgainBtn.addEventListener("click", () => {
  window.location.href = "../pet-searcher/searcher.html";
});

for (let i = 0; i < seeMoreBtn.length; i++) {
  seeMoreBtn[i].addEventListener("click", function () {
    window.location.href = "../pet-searcher/pet-profile.html";
  });
}
