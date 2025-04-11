<?php
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../libs/category.php';

// $categories = getCategories();
  
?>
<h1 class="pb-2 border-bottom">Les catégories</h1>

<div class="row g-4 py-5">
    <div class="col-12">
        <div class="row">
        <?php foreach ($categories as $category) {
        require 'templates/category_part.php';
        } ?>
        </div>
    </div>    
</div>

<?php
require_once __DIR__ . '/../templates/footer.php';
  
?>