console.log("hello pet profile");

const logoNavbar = document.getElementsByClassName("nav-bar__logo");
const donateToPetBtn = document.querySelector("#donateToPet");
const donateToShelterBtn = document.querySelector("#donateToShelter");
// const AdvicesPopUp = document.querySelector("#advices-pop-up");
// const BtnAdvicesPopUp = document.querySelector("#advices-pop-up-btn");

logoNavbar[0].addEventListener("click", () => {
  window.location.href = "../index.html";
});

// BtnAdvicesPopUp.addEventListener("click", function (event) {
//   // Show the notification
//   AdvicesPopUp.style.display = "block";
//   event.preventDefault();

//   // Set a timeout to hide the notification after 5 seconds
//   setTimeout(function () {
//     AdvicesPopUp.style.display = "none";
//     // Execute the default behavior of the button (e.g., submit a form)
//     BtnAdvicesPopUp.click();
//   }, 4000);
// });

// BtnAdvicesPopUp.addEventListener("click", () => {
//   window.location.href = "../pet-searcher/visit-date.php";
// });

donateToPetBtn.addEventListener("click", () => alert("in progress"));

donateToShelterBtn.addEventListener("click", () => alert("in progress"));
