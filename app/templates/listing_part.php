<div class="col-md-4 my-2 d-flex">
    <div class="card w-100 text-center" >
        <img src="/uploads/listing/<?= $listing["image"] ?>" class="card-img-top" alt="<?= $listing["title"] ?>">
        <div class="card-body d-flex flex-column justify-content-between">
            <h5 class="card-title"><?= $listing["title"] ?></h5>
            <p class="card-text"><?= $listing["price"] ?> €</p>
            <a href="/annonce/<?= $listing["id"] ?>" class="btn btn-primary stretched-link w-100">Voir l'annonce</a>
        </div>
    </div>
</div>