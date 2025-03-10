<?php
require_once 'templates/header.php';
require_once 'libs/category.php';

$categories = getCategories();
?>


<div class="form-listing w-100 m-auto">
    <form method="post">
        <h1 class="mb-3 fw-normal">Publier une annonce</h1>
        <div class="py-2">
            <label class="form-label" for="title">Titre</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Que vendez-vous ?">
            
        </div>
        <div class="py-1">
            <label class="form-label" for="price">Prix</label>
            <input name="price" type="number" class="form-control" id="price" placeholder="0">
            
        </div>
        <div class="py-1">
            <label class="form-label" for="description">Description</label>
            <textarea name="description" class="form-control" id="description" placeholder="Dites-nous en plus... ?"></textarea>
        </div>
        <div class="py-2">
            <label class="form-label" for="category">Catégorie</label>
            <select name="category" class="form-select" id="category" >
                <?php foreach ($categories as $key => $category) { ?>
                    <option value="<?=$key?>"><?=$category["name"]?></option>
                <?php } ?>
            </select>
            
        </div>
        <button class="btn btn-primary w-100 py-2 my-1" type="submit">Publier</button>
  </form>

</div>




  <?php
require_once 'templates/footer.php';
?>