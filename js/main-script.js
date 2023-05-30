console.log("hello world JS home page");

const heroCta = document.querySelector(".hero__cta");
const howAdoptPage = document.getElementsByClassName("info-panel__how-adopt");
const logoNavbar = document.getElementsByClassName("nav-bar__logo");

heroCta.addEventListener("click", function () {
  window.location.href = "./pet-searcher/searcher.html";
});

howAdoptPage[0].addEventListener("click", () => {
  window.location.href = "./adoption-info/adopt-info.html";
});

logoNavbar[0].addEventListener("click", () => console.log("hello home button"));
