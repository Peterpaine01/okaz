<?php
require_once 'templates/header.php';
require_once 'libs/pdo.php';
require_once 'libs/listing.php';


$listings = getListings($pdo);
  
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
                <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher">
            </div>
            <div class="py-3 border-bottom">
                <label for="price">Prix</label>
                <div class="input-group py-1">
                    <input type="number" name="min_price" id="min_price" class="form-control" placeholder="Prix minimum">
                    <span class="input-group-text">€</span>
                </div>
                <div class="input-group py-1">
                    <input type="number" name="min_price" id="min_price" class="form-control" placeholder="Prx maximum">
                    <span class="input-group-text">€</span>
                </div>
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