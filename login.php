<?php
require_once 'templates/header.php';
?>


<div class="form-signin w-100 m-auto">
    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Se connecter</h1>

        <div class="form-floating ">
            <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="email">Email</label>
        </div>
        <div class="form-floating py-2">
            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            <label for="password">Mot de passe</label>
        </div>

      
        <button class="btn btn-primary w-100 py-2" type="submit">Connexion</button>
  </form>

</div>




  <?php
require_once 'templates/footer.php';
?>