<?php
require_once 'templates/header.php';
require_once 'libs/pdo.php';
require_once 'libs/user.php';



// var_dump_pre($_POST);
// var_dump_pre($_SERVER["REQUEST_METHOD"]);

$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $verif = verifyUser($_POST);
    if ($verif === true) {
        $res = addUser($pdo, $_POST["username"], $_POST["email"], $_POST["password"]); 
        header("Location: login.php");
    } else {
        $errors = $verif;
    }
}

?>


<div class="form-signin w-100 m-auto">
    <form action="" method="post">
        <h1 class="h3 mb-3 fw-normal">Inscription</h1>
        <div class="form-floating py-2">
            <input name="username" type="text" class="form-control" id="username" placeholder="Username">
            <label for="username">Nom d'utilisateur</label>
            <?php if (isset($errors["username"])) { ?>
                <div class="alert alert-danger my-2 py-1" role="alert">
                    <?= $errors["username"] ?>
                </div>
            <?php } ?>
            
        </div>
        <div class="form-floating py-1">
            <input name="email" type="email" class="form-control" id="email" placeholder="Email">
            <label for="email">Email</label>
            <?php if (isset($errors["email"])) { ?>
                <div class="alert alert-danger my-2 py-1" role="alert">
                    <?= $errors["email"] ?>
                </div>
            <?php } ?>
        </div>
        <div class="form-floating py-2">
            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            <label for="password">Mot de passe</label>
            <div class="alert alert-danger my-2 py-1" role="alert">
                    <?= $errors["password"] ?>
                </div>
        </div>
        <button class="btn btn-primary w-100 py-2 my-1" type="submit" name="add_user">Valider</button>
  </form>

</div>




  <?php
require_once 'templates/footer.php';
?>