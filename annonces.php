<?php
require_once 'templates/header.php';
require_once 'libs/pdo.php';
require_once 'libs/listing.php';
require_once 'libs/category.php';

$filters = [];
if (isset($_GET["search"]) && $_GET["search"] !== "") {
    $filters["search"] = $_GET["search"];
}

if (isset($_GET["min_price"]) && $_GET["min_price"] !== "") {
    $filters["min_price"] = $_GET["min_price"];
}

if (isset($_GET["max_price"]) && $_GET["max_price"] !== "") {
    $filters["max_price"] = $_GET["max_price"];
}

if (isset($_GET["category"]) && $_GET["category"] !== "") {
    $filters["category"] = $_GET["category"];
}


$listings = getListings($pdo, $filters);
$categories = getCategories($pdo);

?>
<h1 class="pb-2 border-bottom">Les annonces</h1>

<div class="row g-4 py-5">
    <div class="col-9">
        <div class="row">
        <?php foreach ($listings as $listing) {
        require'templates/listing_part.php';
        } ?>

        </div>
        
        


    </div>
    <div class="col-3">
        <form action="" method="get">
            <h2>Filtres</h2>
            <div class="py-3 border-bottom">
                <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher" value="<?php if (isset($_GET["search"])) {
                    echo htmlspecialchars($_GET["search"]) ;
                    }?>" >
            </div>
            <div class="py-3 border-bottom">
                <label class="mb-1" for="price">Prix</label>
                <div class="input-group py-1">
                    <input type="number" name="min_price" id="min_price" class="form-control" placeholder="Prix minimum" value="<?php if (isset($_GET["min_price"])) {
                    echo htmlspecialchars($_GET["min_price"]) ;
                    }?>" >
                    <span class="input-group-text">€</span>
                </div>
                <div class="input-group py-1">
                    <input type="number" name="max_price" id="max_price" class="form-control" placeholder="Prix maximum" value="<?php if (isset($_GET["max_price"])) {
                    echo htmlspecialchars($_GET["max_price"]) ;
                    }?>" >
                    <span class="input-group-text">€</span>
                </div>
            </div>
            <div class="py-3 border-bottom">
                <label class="mb-2" for="category">Catégorie</label>
                <select class="form-select form-select-lg mb-3" id="category" name="category" aria-label="Large select example">
                    <option disabled value>Toutes</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?= $category["id"] ?>" <?php if ($category["id"] === (int)$_GET["categories"]) {echo 'selected="selected"';} ?> ><?= $category["name"] ?></option>
                    <?php endforeach; ?>
                    
                </select>
                
            </div>
            <div class="mt-3 ">
                <button type="submit" class="btn btn-primary w-100">Filtrer</button>
            </div>
            
        </form>
    </div>
    
    
</div>





<?php
require_once 'templates/footer.php';
  
?>