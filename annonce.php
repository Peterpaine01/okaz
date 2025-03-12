<?php
require_once 'templates/header.php';
require_once 'libs/pdo.php';
require_once 'libs/listing.php';

$error404 = false;

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $listing = getListingById($pdo, $id);
    if (!$listing) {
        $error404 = true;
    }
} else {
    $error404 = true;
}

  
?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
<?php if (isset($listing) && $listing ): ?>
    <div class="col-10 col-sm-8 col-lg-5">
        <img src="uploads/listing/<?= $listing["image"] ?>" class="d-block mx-lg-auto img-fluid" alt="<?= $listing["title"] ?>" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-7">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= $listing["title"] ?></h1>
        <h2><?= $listing["price"] ?>€</h2>
        <p class="lead"><?= $listing["description"] ?></p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Acheter</button>
            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Ajouter au favoris</button>
        </div>
    </div>
    <?php else: ?>
        <h1>L'annonce est introuvable</h1>
    <?php endif; ?>
</div>




<?php
require_once 'templates/footer.php';
  
?>