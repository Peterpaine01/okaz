<div class="feature col">
    <div class="feature-icon d-inline-flex align-items-center justify-content-center text-white bg-primary bg-gradient fs-2 mb-3 rounded-4" style="width: 64px; height: 64px;">
        <i class="bi-<?= $category["icone"] ?>"></i>
    </div>
    <h3 class="fs-2 text-body-emphasis"><?= $category["name"] ?></h3>
    <a href="/annonces?category=<?= $category["id"] ?>" class="icon-link">
        Voir plus
        <svg class="bi" aria-hidden="true"><use xlink:href="#chevron-right"></use></svg>
    </a>
</div>
