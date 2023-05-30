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
async function fetchData() {
  try {
    const response = await fetch("result-list.php");
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