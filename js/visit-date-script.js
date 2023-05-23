console.log("hello visit date page");

const confirmVisitBtn = document.querySelector("#confirmVisit");
const googleMapsBtn = document.querySelector("#googleMapsBtn");
const whatsAppBtn = document.querySelector("#whatsAppBtn");

confirmVisitBtn.addEventListener("click", () => {
  window.location.href = "../pet-searcher/visit-advices.html";
});

googleMapsBtn.addEventListener("click", () => alert("maps button"));

whatsAppBtn.addEventListener("click", () => alert("whats button"));
