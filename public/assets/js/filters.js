document
  .getElementById("filterForm")
  .addEventListener("submit", function (event) {
    event.preventDefault() // Empêcher la soumission normale du formulaire

    const formData = new FormData(this) // Collecter les données du formulaire
    const searchParams = new URLSearchParams(formData) // Convertir en query string

    // Envoi de la requête AJAX
    fetch("/annonces", {
      method: "GET",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: searchParams.toString(), // Inclure les paramètres de filtre dans l'URL
    })
      .then((response) => response.json()) // Supposons que la réponse soit au format JSON
      .then((data) => {
        // Mise à jour de l'affichage avec les nouvelles annonces filtrées
        const listingsContainer = document.getElementById("listingsContainer")
        listingsContainer.innerHTML = "" // Vider l'ancienne liste d'annonces

        // Ajouter les annonces filtrées au DOM
        data.listings.forEach((listing) => {
          const listingElement = document.createElement("div")
          listingElement.classList.add("listing")
          listingElement.innerHTML = `
                <h3>${listing.title}</h3>
                <p>${listing.price}€</p>
                <p>${listing.description}</p>
            `
          listingsContainer.appendChild(listingElement)
        })
      })
      .catch((error) => console.error("Erreur AJAX:", error))
  })
