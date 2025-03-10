<?php
require_once 'templates/header.php';
?>


<div class="form-signin w-100 m-auto">
    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Inscription</h1>
        <div class="form-floating py-2">
            <input name="username" type="email" class="form-control" id="username" placeholder="Username">
            <label for="username">Nom d'utilisateur</label>
        </div>
        <div class="form-floating py-1">
            <input name="email" type="email" class="form-control" id="email" placeholder="Email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating py-2">
            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            <label for="password">Mot de passe</label>
        </div>
        <button class="btn btn-primary w-100 py-2 my-1" type="submit">Valider</button>
  </form>

</div>




  <?php
require_once 'templates/footer.php';
?>