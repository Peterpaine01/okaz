const filterButton = document.getElementById("filterForm")

if (filterButton) {
  filterButton.addEventListener("submit", function (event) {
    event.preventDefault() // Empêcher la soumission normale du formulaire

    const formData = new FormData(this) // Collecter les données du formulaire
    const searchParams = new URLSearchParams(formData) // Convertir en query string
    console.log("searchParams > ", "/annonces?" + searchParams.toString())
    // Envoi de la requête AJAX
    fetch("/annonces?" + searchParams.toString(), {
      method: "GET",
      headers: {
        "X-Requested-With": "XMLHttpRequest",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        console.log("Données reçues:", data)

        // Ici on récupère le tableau des listings :
        const listings = data.listings

        // Exemple : mettre à jour le DOM avec les nouvelles annonces
        const listingsContainer = document.querySelector("#listingsContainer") // adapte le sélecteur à ton HTML

        listingsContainer.innerHTML = "" // on vide les anciens listings

        listings.forEach((listing) => {
          listingsContainer.innerHTML += `
                <div class="col-md-4 my-2 d-flex">
                    <div class="card w-100 text-center" >
                        <img src="/uploads/listing/${listing.image}" class="card-img-top" alt="${listing.title}">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">${listing.title}</h5>
                            <p class="card-text">${listing.price} €</p>
                            <a href="/annonce/${listing.id}" class="btn btn-primary stretched-link w-100">Voir l'annonce</a>
                        </div>
                    </div>
                </div>
              `
        })
      })
      .catch((error) => console.error("Erreur AJAX:", error))
  })
}
