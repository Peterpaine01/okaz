<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/js/filters.js" defer></script>
    <link rel="stylesheet" href="../assets/css/override-bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Okaz</title>
</head>
<body>
    
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <img src="/assets/images/logo-okaz.png" width="120" alt="Logo Okaz">
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-2 link-secondary">Accueil</a></li>
        <li><a href="/annonces" class="nav-link px-2">Annonces</a></li>
        <li><a href="/categories" class="nav-link px-2">Catégories</a></li>
        <?php if (isset($_SESSION["user"])): ?>
        <li><a href="/publier-annonce" class="nav-link px-2">Publier une annonce</a></li>
        <?php endif; ?>

      </ul>

      <div class="col-md-3 text-end">
        <?php if (isset($_SESSION["user"])): ?>
          <span class="px-1">Bonjour <?= $_SESSION["user"]["username"] ?></span>
          <a href="/logout" class="btn btn-primary">Se déconnecter</a>
        <?php else: ?>
          <a href="/login" class="btn btn-outline-primary me-2">Se connecter</a>
          <a href="/inscription" class="btn btn-primary">S'inscrire</a>
        <?php endif; ?>
      </div>
    </header>
    <main>