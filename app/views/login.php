<?php
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../libs/category.php';
require_once __DIR__ . '/../libs/user.php';

// session_start();

// var_dump_pre($_SESSION);

// $_SESSION["test"] = "abc";

// Redirige si l'utilisateur est déjà connecté
if (!empty($_SESSION["user"])) {
  header("Location: /");
  exit;
}

$error = NULL;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = verifyUserLoginPassword($pdo, $_POST["email"], $_POST["password"]);
    if($user){
      session_regenerate_id(true); // régénère nouvel id de session à chaque connexion, sécurité contre fixation de session (si vol de id de session), id volé devient inutilisable par le pirate à la nouvelle connexion
      $_SESSION["user"] = [
        "id" => $user["id"],
        "username" => $user["username"],
        "email" => $user["email"],
      ];
      header("Location: /");
    } else {
      $error = "Email ou mot de passe incorrect";
    }
    
}

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
        <?php if ($error): ?>
            <div class="alert alert-danger my-2 py-1" role="alert">
                <?= $error ?>
            </div>
        <?php endif ?>  
        <button class="btn btn-primary w-100 py-2" type="submit">Connexion</button>
  </form>

</div>




  <?php
require_once __DIR__ . '/../templates/footer.php';
?>