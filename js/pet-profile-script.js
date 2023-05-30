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

async function fetchData() {
  try {
    const response = await fetch("search.php");
    const data = await response.json();

    const resultsContainer = document.getElementById("resultsContainer");
    resultsContainer.innerHTML = ""; // Clear the container before injecting new content

    data.forEach((result) => {
      const petName = result.name;
      // const petAge = result.age;
      // const petSpecies = result.species;

      const petHTML = `
      <article class="pet-list__item">
            <div>
                <img src="../img/pet-thumb__result-list.png" alt="mascota posando">
                <div>
                    <p>${petName}</p>
                    <span>en Villa Adela</span>
                </div>
            </div>
            <button class="seeMorePet">Ver más</button>
        </article>
      `;

      resultsContainer.innerHTML += petHTML; // Inject the HTML for each item
    });
  } catch (error) {
    console.error("Error:", error);
  }
}

fetchData();