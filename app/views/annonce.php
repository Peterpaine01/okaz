<?php
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../libs/pdo.php';
 
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<div class="alert alert-success">Annonce publiée avec succès !</div>';
}

?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
<?php if (isset($_GET['success']) && $_GET['success'] === 1) {
    echo '<div class="alert alert-success">Annonce publiée avec succès !</div>';
}?>
<?php if (isset($listing) && $listing ): ?>
    <div class="col-10 col-sm-8 col-lg-5">
        <img src="/uploads/listing/<?= $listing["image"] ?>" class="d-block mx-lg-auto img-fluid" alt="<?= $listing["title"] ?>" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-7">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= $listing["title"] ?></h1>
        <h2><?= $listing["price"] ?>€</h2>
        <p class="lead"><?= $listing["description"] ?></p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Acheter</button>
            
        </div>
    </div>
    <?php else: ?>
        <h1>L'annonce est introuvable</h1>
    <?php endif; ?>
</div>




<?php
require_once __DIR__ . '/../templates/footer.php';
  
?>